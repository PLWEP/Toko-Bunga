<?php 

class Account extends Controller {
    public function loginAction() {
        $data['title'] = 'Login';
        $data['login'] = $this->model('ModelAccount')->loginAccount($_POST);
        if (isset($data['login'][0])) {
            $_SESSION['id'] = $data['login'][0]['id'];
            $_SESSION['email'] = $data['login'][0]['email'];
            $_SESSION['status'] = $data['login'][0]['status'];

            if(isset($_SESSION['id'])) {
                header("location: " .BASEURL. "/home");
            }
        } else {
            echo 
            "<script type='text/javascript'>
            if(!alert('Email atau Password salah'))
            {
                document.location = '".BASEURL."';
            }
            ;
            </script>";
        }
    }

    public function registerLayout() {
        $this->view('register/index');
    }

    public function loginLayout() {
        $this->view('login/index');
    }

    public function registerAction() {
        $data = $this->model('ModelAccount')->registerAccount($_POST);

        if($data) {
            $data = $this->model('ModelMember')->add($_POST);
            echo 
            "<script type='text/javascript'>
            if(!alert('Register Berhasil'))
            {
                document.location = '".BASEURL."';
            }
            ;
            </script>";
        } else {
            echo 
            "<script type='text/javascript'>
            if(!alert('Email sudah digunakan'))
            {
                document.location = '".BASEURL."/account/registerLayout';
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