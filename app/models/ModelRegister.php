<?php 

class ModelRegister {
    private $tableEmail = 'login';
    private $tableData = 'member';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function registerAccount($data) {
        $email = $data['temail'];
        $password = $data['tpass'];

        $this->db->query('SELECT if(max(id)is null,1,max(id)+1) as maks_id  FROM ' . $this->tableEmail);
            $data=$this->db->resultSet();
            foreach ($data as $rec){
                $id=$rec["maks_id"];
        }

        $this->db->query('INSERT INTO ' . $this->tableEmail . ' (id, email, password) VALUES ( :id, :email, :password)');
        $this->db->bind('email', $email);
        $this->db->bind('password', $password);
        $this->db->bind('id', $id);
        
        try {
            $this->db->execute();
            return true;
        } catch(PDOException) {
            return false;
        }
    }

    public function add($data) {
        $nama=$data['tnama'];
        $email=$data['temail'];
        $email=$data['temail'];
        $telp=$data['ttelp'];
        $alamat=$data['talamat'];
        $gender=$data['tgender'];

        $this->db->query('SELECT if(max(id)is null,1,max(id)+1) as maks_id  FROM ' . $this->tableData);
            $data=$this->db->resultSet();
            foreach ($data as $rec){
                $id=$rec["maks_id"];
        }

        $this->db->query('INSERT INTO ' . $this->tableData . ' (id,nama_member,email,telp,alamat,gender) 
            values (:id,:nama,:email,:telp,:alamat,:gender)');
        $this->db->bind('id',$id);
        $this->db->bind('nama',$nama);
        $this->db->bind('email',$email);
        $this->db->bind('telp',$telp);
        $this->db->bind('alamat',$alamat);
        $this->db->bind('gender',$gender);
        $res=$this->db->execute();
    }
}

?>