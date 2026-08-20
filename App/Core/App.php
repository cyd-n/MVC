<?php
    Class App {
        protected $controller = 'Home';
        protected $method = 'index';

        protected $params = [];

        public function __construct(){
            require_once '../App/Core/Router.php';
            $router = new Router;
            $router->Get("/Home", "Home@Index", []);
            $router->Get("/About", "About@Index", []);
            $router->ReqeustMethode();
        }
    }

    // MiddleWare = Useful for auth checks, CSRF validation, logging — run before the controller action fires.

    // Flash messages & sessions = Common need after redirects ("Saved successfully!") — a tiny Session helper class pays for itself fast.

    // Error/exception handling = Wrap the whole request lifecycle in try/catch, and register a global exception handler that shows a nice error page in production and a stack trace in dev.

    // Composer = Honestly, the single highest-leverage change: composer init, add PSR-4 autoloading, and pull in vlucas/phpdotenv for config. That alone modernizes a lot of the pain points above with almost no framework rewrite.
