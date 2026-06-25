<?php
// pages/public/checkout.php
require_once __DIR__ . '/../../middleware/AuthMiddleware.php';
AuthMiddleware::check(); // Ensure user is logged in before paying

// Ensure Stripe API key is available
$stripeSecretKey = getenv('STRIPE_SECRET_KEY');

if (!$stripeSecretKey) {
    die("Stripe Secret Key is not configured in the environment.");
}

\Stripe\Stripe::setApiKey($stripeSecretKey);

$domain = "http" . (isset($_SERVER['HTTPS']) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . "/space-shuter";

try {
    $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'client_reference_id' => $_SESSION['user_id'], // Pass the user's ID
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Commander Tier Subscription',
                    'description' => 'Full JWST & Hubble telemetry access, AI Assistant access, and more.',
                ],
                'unit_amount' => 1200, // $12.00
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment', // Use 'subscription' if you have a price ID setup in Stripe
        'success_url' => $domain . '/success?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => $domain . '/pricing',
    ]);

    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkout_session->url);
    exit;
} catch (Exception $e) {
    echo "Error creating Stripe checkout session: " . $e->getMessage();
}
