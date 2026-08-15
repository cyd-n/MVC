<?php
    class ErrorController extends Controller{
        public function Index(){
            $this->View('');
        }

        public function _404(){
            $this->View('Error/_404');
        }
    }
?>
