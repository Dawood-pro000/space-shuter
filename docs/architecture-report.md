# Space Shutter - Architecture & Route Map

## Technology Stack
- **Backend**: PHP (8.x+)
- **Database**: Supabase (PostgreSQL)
- **Styling**: Tailwind CSS (Clean SaaS/Mintlify design per `DESIGN.md`)
- **Routing**: Custom PHP Dynamic Router (Front Controller pattern)

## File Structure Restructure
```text
/
├── public/                 # Document root (index.php, css, images)
├── pages/                  # Page controllers/views
│   ├── public/             # Publicly accessible pages
│   ├── auth/               # Registration, Login, Reset
│   ├── user/               # Protected user pages (Space Feed, etc.)
│   └── admin/              # Protected admin pages
├── components/             # Reusable UI components (Hero, Cards, Buttons)
├── layouts/                # Base HTML layouts (App layout, Public layout, Admin layout)
├── services/               # API & Business Logic (Gemini API, NASA API, Supabase)
├── middleware/             # Auth checks, Admin checks
├── models/                 # Data structures
├── utilities/              # Helpers (Formatting, security)
└── docs/                   # System Documentation
```

## Route Map & Page Map

### Public Routes
- `GET /` -> Home Page
- `GET /discover` -> Discover Page (10 public posts limit)
- `GET /pricing` -> Pricing Page
- `GET /about` -> About Us
- `GET /contact` -> Contact Us
- `GET /privacy` -> Privacy Policy

### Auth Routes
- `GET/POST /register` -> Registration
- `GET/POST /login` -> Login (Redirects to `/feed` upon success)
- `GET/POST /logout` -> Logout
- `GET/POST /reset-password` -> Reset Password

### User Routes (Protected)
- `GET /feed` -> Space Feed
- `GET /study-planner` -> Study Planner
- `GET /journey` -> Journey Tracker
- `GET /library` -> Library
- `GET /profile` -> Profile
- `GET /settings` -> Settings
- `GET /assistant` -> AI Assistant

### Admin Routes (Protected, Admin Only)
- `GET /admin` -> Admin Dashboard
- `GET /admin/posts` -> Posts Management
- `GET /admin/users` -> Users Management
- `GET /admin/subscriptions` -> Subscriptions
- `GET /admin/books` -> Books Management
- `GET /admin/contacts` -> Contact Requests
- `GET /admin/analytics` -> Analytics
- `GET /admin/settings` -> Settings
- `GET /admin/ai-control` -> AI Control Dashboard
