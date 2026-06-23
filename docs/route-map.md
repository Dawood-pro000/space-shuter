# Space Shutter - Route Map

## Implementation Detail
All routes will be handled by a central `index.php` front controller which parses the URL and requires the appropriate file from the `pages/` directory.

### URI -> Internal PHP File Mapping

#### Public API & Webhooks
- `GET/POST /api/*` -> `services/api_router.php`

#### Public Web
- `GET /` -> `pages/public/home.php`
- `GET /discover` -> `pages/public/discover.php`
- `GET /pricing` -> `pages/public/pricing.php`
- `GET /about` -> `pages/public/about.php`
- `GET /contact` -> `pages/public/contact.php`
- `GET /privacy` -> `pages/public/privacy.php`

#### Auth
- `GET/POST /register` -> `pages/auth/register.php`
- `GET/POST /login` -> `pages/auth/login.php`
- `GET/POST /logout` -> `pages/auth/logout.php`

#### User Protected (Requires Auth Middleware)
- `GET /feed` -> `pages/user/feed.php`
- `GET /study-planner` -> `pages/user/study-planner.php`
- `GET /journey` -> `pages/user/journey.php`
- `GET /library` -> `pages/user/library.php`
- `GET /saved` -> `pages/user/saved.php`
- `GET /profile` -> `pages/user/profile.php`
- `GET /settings` -> `pages/user/settings.php`
- `GET /assistant` -> `pages/user/assistant.php`

#### Admin Protected (Requires Auth & Admin Middleware)
- `GET /admin` -> `pages/admin/dashboard.php`
- `GET/POST /admin/posts` -> `pages/admin/posts.php`
- `GET/POST /admin/users` -> `pages/admin/users.php`
- `GET /admin/subscriptions` -> `pages/admin/subscriptions.php`
- `GET/POST /admin/books` -> `pages/admin/books.php`
- `GET/POST /admin/categories` -> `pages/admin/categories.php`
- `GET /admin/contacts` -> `pages/admin/contacts.php`
- `GET /admin/logs` -> `pages/admin/logs.php`
- `GET/POST /admin/settings` -> `pages/admin/settings.php`
- `GET /admin/ai` -> `pages/admin/ai-control.php`
