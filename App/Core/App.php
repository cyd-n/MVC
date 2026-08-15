<?php
    Class App {
        protected $controller = 'Home';
        protected $method = 'index';

        protected $params = [];

        public function __construct(){
           $url = $this->parseUrl();

            if(file_exists('../App/Controllers/' . $url[0] . '.php') || $url[0] == null){
                if(file_exists('../App/Controllers/' . $url[0] . '.php')){
                    $this->controller = $url[0];
                    unset($url[0]);
                } else if(file_exists('../App/Controllers/' . $controller . '.php')){ }

                require_once '../App/Controllers/' . $this->controller . '.php';

                $this->controller = new $this->controller;

                if(isset($url[1]) || isset($method)){
                    if(method_exists($this->controller, $url[1])){
                        $this->method = $url[1];
                        unset($url[1]);
                    } else if(method_exists($this->controller, $method)){ }
                }

                $this->params = $url ? array_values($url) : [];

                call_user_func_array([$this->controller, $this->method], $this->params);
            } else {
                if (file_exists('../App/Controllers/ErrorController.php')) {
                    $this->controller = 'ErrorController';

                    require_once '../App/Controllers/' . $this->controller . '.php';

                    $this->controller = new $this->controller;

                    if (method_exists($this->controller, '_404')) {
                        $this->method = '_404';
                    }

                    call_user_func_array([$this->controller, $this->method], []);
                } else {
                    echo "Error 404";
                }
            }
        }

        public function parseUrl(){
            if(isset($_GET['url'])) {
                return $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            }
        }
    }