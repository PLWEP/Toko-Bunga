<?php 

class Login extends Controller {
    public function index() {
        $this->viewWithoutTemplates('login/index');
    }

    public function loginAction() {
        $data['title'] = 'Login';
        $data['login'] = $this->model('ModelLogin')->loginAccount($_POST);
        if (isset($data['login'][0])) {
            $_SESSION['id'] = $data['login'][0]['id'];
            $_SESSION['email'] = $data['login'][0]['email'];

            if(isset($_SESSION['id'])) {
                header("location: " .BASEURL. "/product");
            }
        } else {
            echo 
            "<script type='text/javascript'>
            if(!alert('Email atau Password salah'))
            {
                document.location = '".BASEURL."/login';
            }
            ;
            </script>";
        }
    }

    public function logoutAction() {
        session_destroy();
        header("location: " .BASEURL. "/home");
    }
}
?>