# CakeBlog

CakeBlog is a CakePHP-based multi-blog application with posts, users, and optional domain-based blog routing. It includes admin tooling, RSS output, and a Docker setup for local development.

## ⚠️ Project Status: Licensing Experiment

> [!NOTE]
> Cakeblog is an open-source project, primarily intended as a technical experiment for learning how software licensing and usage restrictions work.

Please note:

- **Usage Limit**: By default, the app supports only 1 blog. This is intentional for testing licensing logic.
- **Licensing**: Some parts of the project are licensed under a [COMMERCIAL-LICENSE](LICENSE-COMMERCIAL), as indicated in the comments at the top of the relevant files.
- **Non-Commercial**: This project is not for sale and does not include any payment gateway.
- **How to Unlock**: If you wish to use the app for more than 1 blog (up to 5), contact me directly. I can generate a free license key for you.
- **Support Policy**: The project is provided “as-is”. I do not accept feature requests or provide active support or bug fixes for other users.

## Features
- Multi-blog support with posts and users
- Admin panel for managing blogs, posts, and domains
- RSS feed output
- Domain-based blog routing via middleware
- Dockerized development environment
- SQLite and MySQL-ready configuration examples

## Requirements
- PHP 8.1+ (or compatible with the project’s CakePHP version)
- Composer 2
- A database (SQLite/MySQL)
- Optional: Docker + Docker Compose

## Quick start (local)
1. Install dependencies:
	- `composer install`
2. Copy the local config and adjust DB settings:
	- Copy [config/app_local.example.php](config/app_local.example.php) to [config/app_local.php](config/app_local.php)
3. Run migrations and seed data:
	- `bin/cake migrations migrate`
	- `bin/cake migrations seed`
4. Start the dev server:
	- `bin/cake server`
5. Open http://localhost:8765

## Quick start (Docker)
1. Build and start containers:
	- `docker compose up --build`
2. Run migrations inside the container:
	- `docker compose exec app bin/cake migrations migrate`
	- `docker compose exec app bin/cake migrations seed`
3. Open the app at the container’s exposed port.

## Configuration
- Base configuration: [config/app.php](config/app.php)
- Local overrides: [config/app_local.php](config/app_local.php)
- Routes: [config/routes.php](config/routes.php)

## Database
Migrations are located in [config/Migrations](config/Migrations). Seed data is in [config/Seeds](config/Seeds). Example SQLite configuration is provided in [config/app_sqlite.php](config/app_sqlite.php).

## Admin area
Admin templates live under [templates/Admin](templates/Admin). Controllers are in [src/Controller/Admin](src/Controller/Admin).

## RSS
RSS templates are in [templates/Posts/rss](templates/Posts/rss) and view classes in [src/View](src/View).

## Testing
Run the test suite with:
- `vendor/bin/phpunit`

## Linting & Static Analysis
- PHP_CodeSniffer: `vendor/bin/phpcs`
- PHPStan: `vendor/bin/phpstan analyse`
- Psalm: `vendor/bin/psalm`

## License
See [LICENSE](LICENSE) and [LICENSE-COMMERCIAL](LICENSE-COMMERCIAL).
