<?php
    class Logger{
        public function Write($dir = "", $message = ""){
            file_put_contents('../App/Logs/' . $dir, $message);
        }
    }