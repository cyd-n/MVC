<?php
    class Env{
        private static array $data = [];

        public static function Load(){
            $file = __DIR__ . '/../../.env';

            if (!file_exists($file)) {
                throw new Exception("The .env file was not found: " . $file);
            }

            self::$data = parse_ini_file($file);
        }

        public static function Get($key, $default = null){
            return self::$data[$key] ?? $default;
        }
    }