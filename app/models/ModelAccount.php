<?php 

class ModelAccount {
    private $table = 'login';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function loginAccount($data) {
        $email = $data['temail'];
        $password = $data['tpass'];

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email AND password = :password');
        $this->db->bind('email', $email);
        $this->db->bind('password', $password);
        return $this->db->ResultSet();
    }

    public function registerAccount($data) {
        $email = $data['temail'];
        $password = $data['tpass'];
        $status = 'user';

        $this->db->query('SELECT if(max(id)is null,1,max(id)+1) as maks_id  FROM ' . $this->table);
            $data=$this->db->resultSet();
            foreach ($data as $rec){
                $id=$rec["maks_id"];
        }

        $this->db->query('INSERT INTO ' . $this->table . ' (id, email, password, status) VALUES ( :id, :email, :password, :status )');
        $this->db->bind('email', $email);
        $this->db->bind('password', $password);
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);
        
        try {
            $this->db->execute();
            return true;
        } catch(PDOException) {
            return false;
        }
    }
}

?>