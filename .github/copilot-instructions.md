<!-- Copilot instructions for the quran repository -->
# Quick guidance for AI coding agents

This repository is a CakePHP 5.x application with a Vite-based frontend (Vue 3). The file layout follows the CakePHP skeleton with added Vue components under `resources/` and assets handled by `vite`/`package.json`.

Keep suggestions concise, concrete, and repository-aware. Focus on small, safe changes (bugfixes, tests, docs, wiring). Avoid large architectural rewrites without an explicit human request.

Key facts (what to know immediately):
- Backend: CakePHP 5 application. App bootstrap and middleware live in `src/Application.php`.
- CLI: Use the `bin/cake` script for framework console tasks (migrations, baking, server).
- PHP tooling: `composer.json` scripts expose `composer test` → `phpunit`, `composer cs-check` → `phpcs`, `composer stan` → `phpstan analyze`.
- Frontend: Vite entry in `resources/js/main.js`, Vue components in `resources/components/`. Run `npm run dev` or `npm run build` from project root (see `package.json`).
- Database: A SQLite DB is present at `dbs/quran.sqlite` for local/dev. Tests use `tests/bootstrap.php` and `phpunit.xml.dist`.

Common developer workflows to reference in edits:
- Start dev frontend server: `npm run dev` (project root). This watches `resources/` and `resources/scss`.
- Build frontend for production: `npm run build`.
- Run PHP tests: `composer test` (runs `phpunit --colors=always`).
- Code style checks: `composer cs-check` and `composer cs-fix`.
- Static analysis: `composer stan`.
- Start CakePHP built-in server for manual testing: `bin/cake server -p 8765`.

Project-specific conventions and patterns:
- PSR-4 autoloading: App namespace is `App\` mapped to `src/` (see `composer.json`). Plugins live under `plugins/` and follow plugin conventions.
- Views and templates follow CakePHP conventions under `templates/` (controllers under `src/Controller`). Example UI wiring: `resources/js/main.js` mounts Vue components into server-rendered pages by querying element IDs (e.g. `#player_vue`, `#episode`). When editing components, ensure the mounting code in `main.js` remains compatible.
- Dependency injection: `src/Application.php::services()` registers table classes into the container — prefer updating these registration closures when adding table-level services.
- Authentication: Uses `Authentication` plugin configured in `Application::getAuthenticationService()` with custom identifier resolver `App\Identifier\Resolver\CaseInsensitiveOrmResolver` — changes to auth flows should update this file.

Files to consult when making changes (examples):
- `src/Application.php` — middleware, DI, auth configuration.
- `composer.json` — php scripts (test, cs-check, stan) and PHP requirements (PHP >= 8.1).
- `package.json` and `resources/js/main.js` — frontend build/dev commands and Vue mounting patterns.
- `phpunit.xml.dist` and `tests/bootstrap.php` — test runner configuration and fixtures.
- `bin/cake` — entrypoint for console commands (migrations, bake, server).
- `dbs/quran.sqlite` — local SQLite DB used by the app (do not leak or modify without reason).

Examples of safe, useful edits an AI agent can propose or implement:
- Fix a controller action to return the expected view variable (reference `src/Controller/*Controller.php`).
- Add or update a small Vue component and update `resources/js/main.js` to mount it.
- Add a focused PHPUnit test under `tests/TestCase/` for a model or controller.
- Add or update a `composer` script to automate a simple check (keep scripts minimal).

What to avoid or escalate to a human:
- Large DB schema migrations or data migrations without explicit approval.
- Security-sensitive changes (auth, password reset flows) without tests and human review.
- Massive dependency upgrades (beyond patch updates) — prefer proposing the change and a testing plan.

If you modify code, run the quick quality gate locally: `composer test` and `composer cs-check`. If adding frontend code, also run `npm run build` or `npm run dev` to verify bundling.

Ask the user if anything is unclear (for example: target PHP version for deployment, expected CI commands, or preferred test database). Keep suggested changes small and reproducible.

Relevant examples from the repository:
- Mounting pattern: `resources/js/main.js` — createApp(Player).mount(el)
- Auth config: `src/Application.php::getAuthenticationService()` — sets `unauthenticatedRedirect` and loads `Authentication.Session` and `Authentication.Form`.
- DI registration: `src/Application.php::services()` registers `UsersTable`, `PostsTable`, `ProgramsTable`, `EpisodesTable`.

If `.github/copilot-instructions.md` already existed, preserve any unique guidance and append or merge these project-specific facts. When in doubt, prefer to ask the repo owner for intent.
