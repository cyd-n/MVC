<?php
    Class Router {
        protected $controller = 'Home';
        protected $method = 'index';

        protected $params = [];

        protected $urls = [];

        public function Get($url, $controller, $param = []){
            $this->Methode("GET", $url, $controller, $param);
        }

        public function Post($url, $controller, $param = []){
            $this->Methode("POST", $url, $controller, $param);
        }

        public function Put($url, $controller, $param = []){
            $this->Methode("PUT", $url, $controller, $param);
        }

        public function Delete($url, $controller, $param = []){
            $this->Methode("DELETE", $url, $controller, $param);
        }

        protected function Methode($methode, $url, $controller, $param = []){
            $this->urls[] = ["Methode" => $methode, "Url" => $url, "Handler" => $controller];
        }

        public function ReqeustMethode(){ // need to be able to use params
            $method = $_SERVER['REQUEST_METHOD'];

            foreach($this->urls as $url){
                if($url['Methode'] == $method){
                    $requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

                    if($url['Url'] == $requestUrl) {
                        $this->SetController($url['Handler']);
                        return;
                    }
                } else{
                    $this->Error405();
                } 
            }
            
            $this->Error404();
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
                        $this->Error405();
                    }
                }

                $this->params = $url ? array_values($url) : [];

                call_user_func_array([$this->controller, $this->method], $this->params);
            } else { // Enter the 404 Error
                $this->Error404();
            } 
        }

        public function ParseUrl($controller){
            if(isset($controller)) {
                return $url = explode('@',filter_var(rtrim($controller, '@'), FILTER_SANITIZE_URL));
            }
            
            return "";
        } 

        private function Error404(){
            http_response_code(404);
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

        private function Error405(){
            http_response_code(405);
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
    }