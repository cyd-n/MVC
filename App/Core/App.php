<?php
    Class App {
        protected $controller = 'Home';
        protected $method = 'index';

        protected $params = [];

        public function __construct(){
            require_once '../App/Core/Router.php';
            $router = new Router;
            $router->Get("/Home", "Home@Index", []);
            $router->ReqeustMethode();
        }
    }