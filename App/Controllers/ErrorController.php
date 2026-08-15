<?php
    class ErrorController extends Controller{
        public function Index(){
            $this->View('');
        }

        public function _404(){ // Page is not exiting
            $this->View('Error/_404');
        }

        public function _405(){ // Methode is not exiting or to way to exists the methode
            $this->View('Error/_405');
        }
    }
?>
