# Space Shutter - UI/UX Report

## Design System Reset
The current implementation heavily leaned into an Orbitron/Space Grotesk sci-fi aesthetic with "laser glows" and neon colors. This is to be entirely discarded.
The `DESIGN.md` explicitly calls for the **Mintlify** design aesthetic, which is characterized by:

### 1. Professional SaaS Aesthetic
- Clean, readable, and highly professional.
- Focus on typography and generous whitespace.
- Atmospheric gradients only in the hero section, completely flat and dense interfaces in the functional areas (dashboards, articles).

### 2. Layouts & Responsiveness
- **Mobile First**: All components must collapse gracefully.
- **Navigation**: Top navigation bar with logo left, links center, auth actions right.
- **Sidebar**: Admin and user dashboards will utilize a sticky left sidebar with a `hairline` border separating it from the main content.

### 3. User Flows
- **Onboarding**: Simple registration to a clean "Space Feed". No confusing redirects.
- **Discoverability**: Universal search pill in the navigation bar.
- **Study Planner Modal**: A step-by-step wizard (modal or dedicated page) using the standard SaaS clean inputs (no oversized glowing cards).
- **Admin Experience**: Dense, table-based layouts for managing users and posts. Focus on data density and clear actionable buttons (Edit/Delete/Publish).

### 4. Micro-interactions
- Buttons must not have extreme scale transforms; simple color transitions or subtle lift shadows are preferred.
- Focused inputs will highlight in `brand-green` (#00d4a4) to signify active state clearly.
