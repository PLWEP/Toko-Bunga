<?php
    class Controller {
        public function __construct() {
            session_start();
        }
        
        public function view($dir, $data = [])
        {
            if(isset($_SESSION['id'])) {
                require_once '../app/views/templates/' . $_SESSION['status'] . '/index.php';
                require_once '../app/views/' . $dir . '.php';
                require_once '../app/views/templates/footer.php';
            } else {
                require_once '../app/views/' . $dir . '.php';
            }
        }

        public function viewFolder($folder, $file, $data = [])
        {
            if(isset($_SESSION['id'])) {
                require_once '../app/views/templates/' . $_SESSION['status'] . '/index.php';
                require_once '../app/views/' . $folder . '/' .$_SESSION['status']. '/' . $file . '.php';
                require_once '../app/views/templates/footer.php';
            } else {
                require_once '../app/views/' . $view . '.php';
            }
        }

        public function model($model)
        {
            require_once '../app/models/' . $model . '.php';
            return new $model;
        }
    }
?>