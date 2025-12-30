# GitHub Copilot Instructions for RentalHubPHP

Overview
- This is a small Laravel 12 web app (PHP >= 8.2) for listing and renting products. The app uses Eloquent models, Blade views and standard Laravel controllers. Key directories: `app/Http/Controllers`, `app/Models`, `resources/views`, and `routes/web.php`.

Quick setup (commands you can run)
- Composer + env + migrations: `composer install` -> copy `.env.example` to `.env` -> create DB file (if using sqlite) `touch database/database.sqlite` -> `php artisan key:generate` -> `php artisan migrate`
- Frontend: `npm install` then `npm run dev` (or `npm run build` for production). See `package.json` and `vite.config.js`.
- All-in-one script: `composer run setup` (defined in `composer.json`).
- Development run (multi-process): `composer run dev` runs `php artisan serve`, queue listener, log tail (`php artisan pail`) and `npm run dev` concurrently.
- Tests: `composer test` or `php artisan test` / `vendor/bin/phpunit`.

Code & Conventions
- Routes: Not using resource controllers; routes are defined explicitly in `routes/web.php` (e.g. `/products/{id}/show`). Follow the existing URL patterns when adding new endpoints.
- Controllers: Simple controllers in `app/Http/Controllers/*`. Validation is done inline with `$request->validate(...)` rather than Form Request classes (see `ProductController` and `Auth/*Controller`). Match this style for quick changes.
- Models: `app/Models/Product.php` is an empty Eloquent model - no `$fillable` or `$guarded` declared. The code assigns attributes one-by-one (not mass assignment). If you introduce mass assignment, add `$fillable` explicitly.
- Images: Uploaded images are moved directly to `public/products` using `$request->image->move(public_path('products'), $name)`. When changing image handling, update views in `resources/views/products/*` which reference `asset('products/'.$product->image)`.
- Database: Project defaults to `DB_CONNECTION=sqlite` in `.env.example`. Migrations live in `database/migrations/` (see how `user_id` and `location` were added in later migrations); prefer additive migrations (check `if (!Schema::hasColumn(...))` patterns already used).
- Pagination: `myAds()` paginates results: `->paginate(4)`. Keep UI sizing/pagination consistent when adding features.

Testing & Debugging Tips
- If you need to seed quick data, update `database/seeders/DatabaseSeeder.php` and run `php artisan db:seed`.
- Use the provided `composer run dev` to run background jobs and tail logs concurrently while developing: this mirrors typical local environment used by the author.
- For failing `php artisan serve` issues: check if port 8000 is already used or if `.env` is misconfigured (DB/APP_URL). `composer run dev` will start `php artisan serve` for you.

PR guidance for contributors
- Keep routes and controller patterns consistent (explicit routes, inline validation).
- Add migrations for schema changes; write reversible `down()` methods. When adding columns, use `->after()` consistently to maintain ordering when useful.
- If introducing new packages, document how they are configured in `config/*.php` and add any required `vendor:publish` steps in the PR description.

Good to know (pitfalls & quick wins)
- Product model lacks `$fillable` — adding mass assignment without updating the model will cause issues.
- Image uploads use the public folder; be mindful of filename collisions and consider using storage disk + `Storage::disk('public')` if you refactor.
- Authentication: simple email/password login and registration implemented in `app/Http/Controllers/Auth`. Sessions use `database` driver by default in `.env.example`.

If anything here is unclear or you'd like more detail on one area (tests, CI, adding a feature, or refactoring image handling), tell me which section to expand and I'll iterate. 👇

---
File references:
- `routes/web.php`
- `app/Http/Controllers/ProductController.php`
- `app/Http/Controllers/Auth/*`
- `app/Models/Product.php`
- `database/migrations/*`
- `resources/views/products/*`
- `composer.json` and `package.json` (scripts)
