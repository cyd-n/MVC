<?php
    class Logger{
        public function Write($dir = "", $message = ""){
            require_once '../App/Core/Env.php';

            if(Env::Get('DEBUG')){
                file_put_contents('../Logs/' . $dir, $message);
            }
        }
    }