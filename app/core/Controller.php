<?php
    class Controller {
        public function __construct() {
            session_start();
        }
        
        public function view($dir, $data = [])
        {
            if(isset($_SESSION['id'])) {
                require_once '../app/views/templates/login/header.php';
            } else {
                require_once '../app/views/templates/header.php';
            }
            require_once '../app/views/' . $dir . '.php';
            require_once '../app/views/templates/footer.php';
        }

        public function viewWithoutTemplates($dir) 
        {
            require_once '../app/views/' . $dir . '.php';
        }

        public function model($model)
        {
            require_once '../app/models/' . $model . '.php';
            return new $model;
        }
    }
?>