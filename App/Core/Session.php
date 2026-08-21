<?php
    class Session{
        public static function Set($key, $val){
            $_SESSION[$key] = $val;
        }

        public static function Get($key, $default = null){
            return $_SESSION[$key] ?? $default;
        }

        public static function UnSet($key){
            unset($_SESSION[$key]);
        }

        public static function Flash($key, $val){
            $_SESSION['_flash'][$key] = $val;
        }

        public static function GetFlash($key, $default = null){
           $val = $_SESSION['_flash'][$key] ?? $default = null;
           unset($_SESSION['_flash'][$key]);
           return $val;
        }
    }