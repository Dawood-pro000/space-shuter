<?php
// api/stripe-webhook.php
require_once __DIR__ . '/../services/DatabaseService.php';

$stripeSecretKey = getenv('STRIPE_SECRET_KEY');
$endpoint_secret = getenv('STRIPE_WEBHOOK_SECRET'); // Add this to your .env and Railway!

if (!$stripeSecretKey) {
    http_response_code(500);
    exit("Missing Stripe Secret Key");
}
\Stripe\Stripe::setApiKey($stripeSecretKey);

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
$event = null;

try {
    if ($endpoint_secret) {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
    } else {
        // Fallback for local testing if secret is not set
        $event = \Stripe\Event::constructFrom(
            json_decode($payload, true)
        );
    }
} catch(\UnexpectedValueException $e) {
    http_response_code(400);
    exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
    http_response_code(400);
    exit();
}

// Handle the event
if ($event->type == 'checkout.session.completed') {
    $session = $event->data->object;
    $user_id = $session->client_reference_id;
    
    if ($user_id) {
        try {
            $db = DatabaseService::getConnection();
            
            // 1. Update user tier to 'pro'
            $stmt = $db->prepare("UPDATE public.users SET subscription_tier = 'pro' WHERE id = :id");
            $stmt->execute(['id' => $user_id]);
            
            // 2. Log subscription / payment
            $stmt = $db->prepare("INSERT INTO public.subscriptions (user_id, plan, status, payment_history) VALUES (:uid, 'Commander', 'active', :ph)");
            $stmt->execute([
                'uid' => $user_id,
                'ph' => json_encode([['event' => 'checkout.session.completed', 'amount' => $session->amount_total, 'currency' => $session->currency, 'date' => date('c')]])
            ]);
            
        } catch (Exception $e) {
            http_response_code(500);
            echo "Database error: " . $e->getMessage();
            exit;
        }
    }
}

http_response_code(200);
