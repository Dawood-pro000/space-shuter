# Space Shutter - Component Plan

## Philosophy
All components will be built strictly following `DESIGN.md` (Mintlify aesthetic).
TailwindCSS will be used exclusively.
No inline styles. No oversized elements.

## Base Components

### 1. Typography & Colors
- **Fonts**: `Inter` for all UI text, `Geist Mono` for code and telemetry output.
- **Brand Colors**: `primary` (#0a0a0a), `brand-green` (#00d4a4), `surface` (#f7f7f7), etc., as defined in `DESIGN.md`.

### 2. Buttons
- **Primary Pill**: Black (`bg-primary`), white text, fully rounded (`rounded-full`).
- **Accent Green Pill**: Mint green (`bg-brand-green`), black text. Used sparingly (e.g., "Get started").
- **Secondary Ghost**: Transparent background, border hairline, used for secondary actions.
- **Admin Danger**: Soft red (`bg-brand-error`) for deletes or warnings.

### 3. Cards
- **Base Card**: White (`bg-canvas`), 1px hairline border, `rounded-lg` (12px), `p-6` or `p-8` spacing.
- **Feature Card**: Soft grey (`bg-surface`), `rounded-lg`, no border, generous padding.

### 4. Layouts
- **Hero Sections**: Sky-blue to soft cream gradients `bg-gradient-to-b from-hero-sky-from to-hero-sky-to`.
- **Top Navigation**: Fixed, sticky, `backdrop-blur-md` on `bg-canvas/80`, hairline bottom border.
- **Sidebar**: 3-column layouts for documentation/admin areas.

### 5. Form Elements
- **Inputs**: `rounded-md`, hairline borders, focus states apply a `2px solid brand-green` border.
- **Labels**: `text-sm`, `text-steel`, `font-medium`.

## Reusable Structure
These components will be implemented as PHP functions or include files in `/components/`.
Example: `components/button_primary.php`, `components/card_base.php`.
