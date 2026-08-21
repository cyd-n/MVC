<?php
    Class Router {
        protected $controller = 'Home';
        protected $method = 'index';

        protected $params = [];

        protected $urls = [];

        public function Get($url, $controller, $param = [], $middleware = []){
            $this->Methode("GET", $url, $controller, $param, $middleware);
        }

        public function Post($url, $controller, $param = [], $middleware = []){
            $this->Methode("POST", $url, $controller, $param, $middleware);
        }

        public function Put($url, $controller, $param = [], $middleware = []){
            $this->Methode("PUT", $url, $controller, $param, $middleware);
        }

        public function Delete($url, $controller, $param = [], $middleware = []){
            $this->Methode("DELETE", $url, $controller, $param, $middleware);
        }

        protected function Methode($methode, $url, $controller, $param = [], $middleware = []){
            $this->urls[] = ["Methode" => $methode, "Url" => $url, "Handler" => $controller, "Middleware" => $middleware];
        }

        public function ReqeustMethode(){ // need to be able to use params
            $method = $_SERVER['REQUEST_METHOD'];

            foreach($this->urls as $url){
                if($url['Methode'] == $method){
                    $requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

                    if($url['Url'] == $requestUrl) {
                        foreach($url['Middleware'] as $middleware){
                            if(file_exists('../App/Middleware/' . $middleware . '.php')){
                                require_once '../App/Middleware/' . $middleware . '.php';

                                $middlewareObj = new $middleware();

                                $middlewareObj->Handle();
                            }
                        }
                        $this->SetController($url['Handler']);
                        return;
                    }
                } 
            }
            
            $this->Error404("The Reqeusted Page do not exist check if you have set the right controller in router on 'App/Core/App.php' on line 12");
        }

        public function SetController($controller = ""){
           $url = $this->ParseUrl($controller);
           if(file_exists('../App/Controllers/' . $url[0] . '.php') || $url[0].trim() == ""){
                if(file_exists('../App/Controllers/' . $url[0] . '.php')){
                    $this->controller = $url[0];
                    unset($url[0]);
                } else if(file_exists('../App/Controllers/' . $controller . '.php')){ }

                require_once '../App/Controllers/' . $this->controller . '.php';

                $this->controller = new $this->controller;

                $methode_name = strtolower($url[1]);

                if(isset($methode_name) || isset($this->method)){
                    if(method_exists($this->controller, $methode_name)){
                        $this->method = $methode_name;
                        unset($url[1]);
                    } else if(method_exists($this->controller, $this->method) && $url[1] == null){ 
                        // skip
                    } else {
                        $this->Error405("The Reqeusted Methode is not Allowed check if you the methode exis on line 12, if thet in the controll and that you set the right methode on router on 'App/Core/App.php' on line 12 or maybe you use a Other Reqeust Methode then writing in controller or you use a Reqeust methode that in not allowed that allowed once are: GET,POST, PUT, DELETE'");
                    }
                }

                $this->params = $url ? array_values($url) : [];

                call_user_func_array([$this->controller, $this->method], $this->params);
            } else { // Enter the 404 Error
                $this->Error404("The Reqeusted Page do not exist, Make a controller named $url[0]");
            } 
        }

        public function ParseUrl($controller){
            if(isset($controller)) {
                return $url = explode('@',filter_var(rtrim($controller, '@'), FILTER_SANITIZE_URL));
            }
            
            return "";
        } 

        private function Error404($message = ""){
            http_response_code(404);
            $this->ErrorWriter("404", $message);
            if (file_exists('../App/Controllers/ErrorController.php')) {
                $this->controller = 'ErrorController';

                require_once '../App/Controllers/' . $this->controller . '.php';

                $this->controller = new $this->controller;

                if (method_exists($this->controller, '_404')) {
                    $this->method = '_404';
                }

                call_user_func_array([$this->controller, $this->method], []);
            } else {
                die("404: page not found");
            }
            
        }

        private function Error405($message = ""){
            http_response_code(405);
            $this->ErrorWriter("405", $message);
            if (file_exists('../App/Controllers/ErrorController.php')) {
                $this->controller = 'ErrorController';

                require_once '../App/Controllers/' . $this->controller . '.php';

                $this->controller = new $this->controller;

                if (method_exists($this->controller, '_405')) {
                    $this->method = '_405';
                }

                call_user_func_array([$this->controller, $this->method], []);
            } else {
                die("404: methode not allowed");
            }
        }

        private function ErrorWriter($type, $message){
            require_once '../App/Core/Logger.php';

            switch($type){
                case "404": $errorMessage = "Page Not Found";
                case "405": $errorMessage = "Methode Not Allowed";
                default: "";
            }

            $logger = new Logger;
            $logger->Write("Error.txt", "Error-" . $type . '"' . $errorMessage . '"' . ": " . $message);
        }
    }