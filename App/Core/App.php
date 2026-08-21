<?php
    Class App {
        protected $controller = 'Home';
        protected $method = 'index';

        protected $params = [];

        public function __construct(){
            session_start();

            require_once '../App/Core/Router.php';

            $router = new Router;
            $router->Get("/Home", "Home@Index", [], []);
            $router->Get("/About", "About@Index", [], []);
            $router->ReqeustMethode();
        }
    }

    // Thing i need to add
    // Composer = Honestly, the single highest-leverage change: composer init, add PSR-4 autoloading, and pull in vlucas/phpdotenv for config. That alone modernizes a lot of the pain points above with almost no framework rewrite.

    // URL parameter extraction =  Right now if someone visits /Home/index/Alice, there's no clean way to get Alice into the controller. You'd want your router to support something like /hello/{name} and pull the value out of the actual URL segments — not from the Home@Index handler string like it does now.

    // A real Model.php = It's currently just two comment lines. This is your biggest functional gap — no database connection exists anywhere. Add a PDO connection wrapped in a base Model class that User (and future models) can extend, so you can actually query data instead of hardcoding $name = "Hank".

    // Config / .env = DB credentials, a debug toggle, base URL — none of that has anywhere to live yet. A tiny config file (or .env loader) beats hardcoding values into classes later.

    // Composer + namespacing = Right now everything is global classes with manual require_once calls using hardcoded relative paths ('../App/Controllers/') — that's fragile if the app is ever invoked from a different working directory. Composer's PSR-4 autoloading fixes both: no more manual requires, and paths resolve correctly regardless of cwd.

    // Uncaught error handling =  but there's currently no safety net for a plain PHP exception or fatal error (e.g. a bug in a controller). set_exception_handler() + set_error_handler() would route any crash through your existing ErrorController (maybe a generic _500) instead of a raw PHP error dump.

    // mall polish items I noticed while testing: = Controller::View()'s footer check tests file_exists($view) twice instead of checking Footer.php exists — works by accident, but the logic reads wrong. App/Views/Home/index.php echoes $data['name'] — wait, actually in your version it's $data['name'] but Controller::View() calls extract()-less inclusion, so $data isn't defined; double check that variable is actually reaching the view (worth testing with a var_dump if you haven't rendered it yet).

    // Input validation & sanitization = Right now nothing checks what comes in from $_POST/$_GET. A small Validator or Request helper class ($request->validate(['email' => 'required|email'])) saves you from scattering manual isset()/filter_var() checks through every controller method.

    // CSRF protection = Specifically for state-changing requests (POST/PUT/DELETE). Generate a token per session, embed it in forms, and check it via a middleware (ties nicely into the middleware system from before) before the controller runs.

    // A query builder or at least a thin DB helper = Once Model.php has a real PDO connection, raw prepare()/execute() everywhere gets repetitive fast. Even a minimal helper like $this->db()->table('users')->where('id', $id)->first() saves a lot of boilerplate — doesn't need to be a full ORM.

    // Simple layouts/partials for views = Your Header.php/Footer.php split is a start, but it's rigid — every view gets wrapped the same way. Consider letting a controller specify a layout (or none), and support including reusable partials (like a nav component) from inside a view.

    // Route groups / prefixes = Once you have more than a handful of routes, repeating /admin/... on every single one gets tedious. A $router->group('/admin', function($router) { ... }) helper that prefixes a batch of routes (and can also attach shared middleware, like requiring admin auth) pays off quickly.

    // JSON/API responses = If you ever want an endpoint that returns data instead of HTML, add a json($data) helper on Controller that sets the right content-type header and encodes the response — cleaner than manually calling header() + json_encode() in every method that needs it.

    // Logging = Beyond just error logging — a simple Logger class for app events (failed logins, important actions) that writes to a file with timestamps. Useful for debugging things that aren't crashes.

    // Security headers = A few lines in your bootstrap (Content-Security-Policy, X-Frame-Options, X-Content-Type-Options) cost nothing and close off a bunch of common attack classes for free.

    // Basic rate limiting = Especially once you have a login route — track failed attempts per IP/session in a simple counter (even just in the session or a file) and lock out after N tries for a short window.

    // Tests = Nothing here is currently testable in an automated way. Once Composer's in place, pulling in PHPUnit and writing even a handful of tests for your Router's matching logic would've caught both bugs I found earlier automatically, instead of needing manual curl testing.

    // A dependency container / service locator = As the app grows, controllers will need more than just models — a mailer, a logger, an HTTP client. Instead of new-ing everything by hand everywhere, a tiny container ($container->get('mailer')) that knows how to build each service once and hand it out keeps construction logic in one place.

    // Database migrations = Right now if you change your schema, it's manual SQL. A migrations system — versioned files like 2026_08_20_create_users_table.php, each with an up()/down(), tracked in a migrations table — means your schema evolves in git alongside your code instead of living only in someone's head (or a .sql dump nobody updates).

    // Seeders / test data = Paired with migrations — a way to populate the DB with fake data for local dev (php console seed), so you're not manually inserting rows every time you wipe your database.
