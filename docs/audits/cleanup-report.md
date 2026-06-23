# Space Shutter - Cleanup Report

## Target Deletions
The following files and directories MUST be deleted as they represent the old, incorrect architecture and reference templates:

1. `admin/` - Contains old sci-fi templates (`admin-panel.php`, `ai_assistant.php`, `dashboard.php`).
2. `user/` - Contains old sci-fi templates (`core-discovery.php`, `article-view.php`, `study-planner.php`).
3. `auth/` - Needs to be rebuilt inside `pages/auth/`.
4. `how to do task/` - Contains Gemini scratchpad files.
5. `templates/` - Contains legacy UI includes.
6. `index.php` - Needs to be completely replaced by the new front-controller router.
7. `download_ui.ps1` - Unnecessary.
8. `api/` and `app/api/` - Duplicate API routing logic to be replaced by `services/`.

## Target Creations
1. `/pages/` for all view logic.
2. `/components/` for reusable Tailwind components (following Mintlify's design.md).
3. `/layouts/` for base HTML shells.
4. `/services/` for Supabase, NASA, and Gemini integrations.
5. `/middleware/` for Auth and Admin protection.
6. `index.php` at the root as the master router.

## Action Plan
1. Delete all target directories.
2. Setup the Front Controller (`index.php`) and standard `.htaccess` for URL rewriting.
3. Stub out the `pages/`, `components/`, `layouts/`, and `services/` directories.
