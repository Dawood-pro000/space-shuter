# Space Shutter - Roadmap & Scalability Report

## Scalability Strategy
To support 100,000+ users and millions of posts:
1. **Stateless Services**: The PHP application must be stateless. Sessions can be stored in the database or a cache (Redis), allowing horizontal scaling of the web servers.
2. **Supabase PostgreSQL**: Rely on Supabase's managed Postgres. Ensure indexes are created on frequently queried columns (`slug`, `user_id`, `category_id`, `status`).
3. **Service Layer Abstraction**: AI Providers (Gemini) and APIs (NASA) are abstracted into `services/`. Adding new providers (Claude, OpenAI) requires only a new class implementing the same interface.
4. **Caching**: Future-ready by ensuring database queries can be wrapped in a caching layer.
5. **Asset CDN**: Images from NASA should eventually be proxied or cached via a CDN to reduce egress load.

## Implementation Roadmap

### Phase 1: Foundation & Cleanup (Current)
- Execute project reset.
- Setup directory structure (`pages`, `services`, `components`, `middleware`).
- Implement Front Controller routing.
- Create base layouts using `DESIGN.md` (Mintlify aesthetic).

### Phase 2: Authentication & Core Database
- Supabase connection setup.
- User registration, login, logout, password hashing.
- Route protection (Auth middleware, Admin middleware).

### Phase 3: Admin System & Content Management
- Admin Dashboard UI.
- Post CRUD operations (Draft, Publish, Schedule).
- Category and User management.
- Activity Logging.

### Phase 4: User Experience
- Public pages (Home, Discover).
- User Dashboard & Space Feed.
- Bookmarks & Library functionality.

### Phase 5: AI & Integrations
- NASA API automated fetching.
- Gemini API integration with 3-key separation.
- Study Planner generation.
- AI Chatbot implementation.

### Phase 6: Polish & Gamification
- Achievements system.
- Journey Tracker visualization.
- Final UI/UX review against `DESIGN.md`.
