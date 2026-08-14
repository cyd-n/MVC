<?php
    class Home extends Controller{
        public function Index($name = ''){
            $user = $this->Model('User');
            $user->name = $name;
            
            $this->View('Home/index', ['name' => $user->name]);
        }
    }
?>
