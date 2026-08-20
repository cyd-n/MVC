<?php
    class About extends Controller{
        public function Index($name = ''){
            $user = $this->Model('User');
            $user->name = $name;
            
            $this->View('About/index', ['name' => $user->name]);
        }
    }
?>
