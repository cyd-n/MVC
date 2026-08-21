<?php
    class Logger{
        public function Write($dir = "", $message = ""){
            require_once '../App/Core/Env.php';

            if(Env::Get('DEBUG')){
                $timeStamp = date('Y-m-d H:i:s');
                file_put_contents('../Logs/' . $dir, "[" . $timeStamp . "]: " . $message . "\n", FILE_APPEND | LOCK_EX);
            }
        }
    }