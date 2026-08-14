<?php
    class Controller{
        protected function model($model){
            if(file_exists('../App/Models/' . $model . '.php')){
                require_once '../App/Models/' . $model . '.php';
                return new $model();
            }
        }
    }