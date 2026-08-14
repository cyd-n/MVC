<?php
    class Home extends Controller{
        public function Index($name = ''){
            $user = $this->model('User');
            $user->name = $name;
            echo $user->name;
        }
    }
?>
