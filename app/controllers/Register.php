<?php 

class Register extends Controller {
    public function index() {
        $this->viewWithoutTemplates('register/index');
    }

    public function registerAction() {
        $data = $this->model('ModelRegister')->registerAccount($_POST);

        if($data) {
            $data = $this->model('ModelRegister')->add($_POST);
            echo 
            "<script type='text/javascript'>
            if(!alert('Register Berhasil'))
            {
                document.location = '".BASEURL."/login';
            }
            ;
            </script>";
        } else {
            echo 
            "<script type='text/javascript'>
            if(!alert('Email sudah digunakan'))
            {
                document.location = '".BASEURL."/login';
            }
            ;
            </script>";
        }
    }
}
?>