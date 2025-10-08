# Copilot Instructions for php-website

## Project Overview
- This is a simple PHP website, containerized using Docker Compose.
- The site is served by Nginx and PHP-FPM (see `docker-compose.yml` and `nginx/default.conf`).
- All web content (PHP, CSS, images, JS, audio) is in the `www/` directory.

## Architecture & Key Files
- **Nginx config:** `nginx/default.conf` — routes all requests to PHP or static files.
- **PHP entrypoints:** `www/index.php`, `www/menu.php`, `www/info.php` — main pages.
- **Static assets:**
  - CSS: `www/style.css`
  - Images: `www/images/`
  - Audio: `www/audio/`
  - JS: inline in HTML/PHP files
- **Docker Compose:** `docker-compose.yml` — defines `nginx` and `php-fpm` services, mounts `www/` as web root.

## Developer Workflows
- **Start/stop site locally:**
  - `docker compose up -d` (start)
  - `docker compose down` (stop)
- **Access site:** http://localhost:8081
- **Edit site:** Change files in `www/` and refresh browser. No build step required.
- **Debug PHP:** Use `info.php` for phpinfo output. For more debugging, add `var_dump` or similar in PHP files.

## Conventions & Patterns
- **No frameworks:** Pure PHP, HTML, CSS, and JS (no Composer, no npm).
- **All routing is handled by Nginx and PHP, not by a framework.**
- **Inline JS/CSS:** Some styles/scripts are inline in PHP/HTML files for simplicity.
- **Dutch language:** Most content is in Dutch.
- **No database:** All content is static or hardcoded in PHP.

## Integration Points
- **External:**
  - LinkedIn icon in footer links to an external profile.
  - No external APIs or backend integrations.
- **Docker volumes:** All code changes in `www/` are reflected live in the running container.

## Examples
- To add a new page: create a new `.php` file in `www/` and link it from `index.php` or `menu.php`.
- To change the menu: edit `menu.php`.
- To update styles: edit `style.css`.

## Cautions
- Do not add frameworks or package managers unless explicitly requested.
- Do not change Docker or Nginx config unless the web structure changes.
- Keep all assets in `www/` for simplicity.

---
If you are unsure about a workflow or convention, check `docker-compose.yml`, `nginx/default.conf`, and the structure of `www/` for examples.
