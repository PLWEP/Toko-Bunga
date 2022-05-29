<?php 

class Member extends Controller {
    public function index() {
        if (isset($_SESSION['id'])) {
            $data['title'] = 'Member';
            $data['member'] = $this->model('ModelMember')->getAll();
            $this->view('member/index', $data);

        } else {
            $this->view('login/index');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Member';
        $data['member'] = $this->model('ModelMember')->getByID($id);
        $this->view('member/edit', $data);
    }

    public function add() {
        $data['title'] = 'Add Member';  
        $this->view('member/tambah');
    }

    public function inpMember() {
        $hasil = $this->model('ModelMember')->add($_POST);
        header("location: " .BASEURL. "/member");
    }

    public function editMember() {
        $this->model('ModelMember')->edit($_POST);
        header("location: " .BASEURL. "/member");
    }

    public function deleteMember($id) {
        $this->model('ModelMember')->delete($id);
        header("location: " .BASEURL. "/member");
    }
}
?>