<?php 

class ModelLogin {
    private $tableEmail = 'login';
    private $tableData = 'member';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function loginAccount($data) {
        $email = $data['temail'];
        $password = $data['tpass'];

        $this->db->query('SELECT * FROM ' . $this->tableEmail . ' WHERE email = :email AND password = :password');
        $this->db->bind('email', $email);
        $this->db->bind('password', $password);
        return $this->db->ResultSet();
    }

    public function getByID($id) {
        $this->db->query('SELECT * FROM ' . $this->tableData . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->singleResultSet();
    }
}
?>