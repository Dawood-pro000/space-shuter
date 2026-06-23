# Space Shutter - Security Report

## 1. Authentication & Passwords
- All passwords MUST be hashed using PHP's `password_hash()` and verified with `password_verify()`.
- Plain text passwords will never be stored or logged.
- Session management must be secure (HTTPOnly, Secure flags on session cookies).

## 2. API Keys & Secrets
- Never hardcode API keys in PHP files.
- All secrets (Supabase keys, Gemini keys, NASA API keys) must be loaded from `.env` via a robust environment loader.
- Segregation of Gemini Keys:
  - Key 1: Research Engine (Backend Cron/Worker)
  - Key 2: Publishing Engine (Admin/Backend)
  - Key 3: Assistant (User-facing Chatbot)

## 3. Authorization & Access Control
- **Middleware Pattern**: Implement a central routing or middleware layer to check roles.
- `admin/*` routes MUST check for `role === 'admin'`. Unauthorized users must be immediately redirected (HTTP 302 or 403).
- User data isolation: A user must only be able to view/modify their own bookmarks, study plans, and profile.

## 4. Input Validation & Output Encoding
- Prevent SQL/NoSQL Injection: All database interactions will go through the Supabase REST/PostgREST API or prepared PDO statements with strictly bound parameters.
- Prevent XSS: Output from users or AI must be properly encoded using `htmlspecialchars()` before rendering in HTML.

## 5. Database Service Layer
- UI components will never construct queries. They will call methods like `DatabaseService::getPosts()`, which handles the secure communication with Supabase.
