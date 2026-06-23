# Space Shutter - Audit Report

## 1. Incorrect / Reference Pages
- **Sci-Fi Aesthetic Templates**: `admin/admin-panel.php`, `user/core-discovery.php`, `user/article-view.php`, `user/research-archive.php`, `user/sector-details.php`, `user/study-planner.php`, `admin/ai_assistant.php`, `admin/api-management.php`, `admin/dashboard.php`. These pages use a "Project Vision" sci-fi aesthetic (Orbitron, Space Grotesk, "laser-glow", etc.) which completely contradicts the `DESIGN.md` "Mintlify / Clean SaaS" aesthetic requirement. These are reference templates that incorrectly dictate the architecture.
- **Index/Home Page**: `index.php` tries to follow `DESIGN.md` but hardcodes content and relies on an inconsistent file structure.

## 2. Broken Pages & Routing
- **Incorrect Routing**: The application currently relies on direct file access (e.g., `/user/core-discovery.php`), which makes applying middleware (like auth/admin checks) difficult and breaks dynamic routing principles. A centralized router (`index.php` as Front Controller) is required.

## 3. Dead & Duplicate Code
- **Scratchpads**: `how to do task/gemini-code-*.php` are leftover scratchpad files.
- **Duplicate APIs**: `api/api.php` and `app/api/api.php` exist. The project structure is messy.
- **PowerShell Scripts**: `download_ui.ps1` is unnecessary for the final production app.
- **Templates**: `templates/bootstrap.php`, `templates/header.php`, `templates/footer.php`, `templates/sidebar.php` contain legacy UI code mixed with the incorrect sci-fi theme.

## 4. Unused APIs & Components
- The current NASA integration (`cron/fetch_nasa_data.php`) and AI tools are disjointed and not utilizing the strict 3-API-key separation requested (1: Research, 2: Publishing, 3: Assistant).

## 5. Summary
The current file structure and UI must be scrapped. A full reset is required to move to a `pages/`, `services/`, `components/`, `layouts/`, `middleware/`, `models/`, `utilities/` architecture with dynamic routing.
