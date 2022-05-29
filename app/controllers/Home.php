<?php 
    class Home extends Controller {
        function index() {
            if (isset($_SESSION['id'])) {
                $this->view('home/index');
            } else {
                $this->view('login/index');
            }
        }
    }
?>