<?php
    class Controller{
        protected function Model($model){
            if(file_exists('../App/Models/' . $model . '.php')){
                require_once '../App/Models/' . $model . '.php';
                return new $model();
            }
        }

        public function View($view, $data = []){
            if(file_exists('../App/Templates/Header.php')){
                require_once '../App/Templates/Header.php';
            }

            if(file_exists('../App/Views/' . $view . '.php')){
                require_once '../App/Views/' . $view . '.php';
            }

            if(file_exists('../App/Templates/Footer.php')){
                require_once '../App/Templates/Footer.php';
            }
        }
    }