# Super Stránka (custom WordPress theme)

This is a lightweight starter theme prepared for your site. It includes sensible defaults and support for the block editor.

## What’s included
- Minimal templates: `header.php`, `footer.php`, `index.php`, `single.php`, `page.php`, `404.php`
- Theme setup in `functions.php` (title tag, thumbnails, custom logo, HTML5, block editor features)
- Two menu locations: Primary and Footer
- One widget area: Sidebar (`sidebar-1`)
- Conditional asset enqueue from `styles/main.css` and `script/main.js` if present

## Quick start
1. Log in to WordPress admin → Appearance → Themes and activate “Super Stránka”.
2. Appearance → Menus:
   - Create a menu and assign it to the “Primary Menu” location.
   - Optionally create another for the “Footer Menu”.
3. Appearance → Customize or Site Editor:
   - Upload a custom logo (Appearance → Customise → Site Identity).
4. Widgets:
   - Add widgets to “Sidebar” (Appearance → Widgets) if you plan to use a sidebar in templates.
5. Assets (optional):
   - Add `styles/main.css` for additional CSS; it will be auto-enqueued.
   - Add `script/main.js` for theme JS; it will be auto-enqueued in the footer.

## Development notes
- Text domain: `super_stranka` (for translations). Place PO/MO files in `languages/`.
- To customize editor styles, create `styles/editor.css`; it will load automatically in the block editor.
- The main stylesheet header in `style.css` defines the theme metadata used by WordPress.

## File overview
- `style.css` — Theme header + base styles
- `functions.php` — Theme setup, assets, menus, widgets
- `header.php` / `footer.php` — Site wrapper with `wp_head()` and `wp_footer()` hooks
- `index.php` — Fallback template (archives and default views)
- `single.php` — Single post view
- `page.php` — Static page view
- `404.php` — Not found

## Next steps
- Build out page templates and components as needed.
- Create a `sidebar.php` if you want to render the registered widget area on pages.
- Consider adding a `theme.json` to fine-tune block editor presets (colors, typography).
