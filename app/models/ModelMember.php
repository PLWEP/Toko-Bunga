<?php 

class ModelMember {
    private $table = 'member';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getByID($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->singleResultSet();
    }

    public function add($data) {
        $nama=$data['tnama'];
        $email=$data['temail'];
        $email=$data['temail'];
        $telp=$data['ttelp'];
        $alamat=$data['talamat'];
        $kota=$data['tkota'];
        $provinsi=$data['tprov'];
        $gender=$data['tgender'];

        $this->db->query('SELECT if(max(id)is null,1,max(id)+1) as maks_id  FROM ' . $this->table);
            $data=$this->db->resultSet();
            foreach ($data as $rec){
                $id=$rec["maks_id"];
        }

        $this->db->query('INSERT INTO ' . $this->table . ' (id,nama_member,email,telp,alamat,kota,provinsi,gender) 
            values (:id,:nama,:email,:telp,:alamat,:kota,:provinsi,:gender)');
        $this->db->bind('id',$id);
        $this->db->bind('nama',$nama);
        $this->db->bind('email',$email);
        $this->db->bind('telp',$telp);
        $this->db->bind('alamat',$alamat);
        $this->db->bind('kota',$kota);
        $this->db->bind('provinsi',$provinsi);
        $this->db->bind('gender',$gender);
        $res=$this->db->execute();
    }

    public function edit($data) {
        $id=$data['tid'];
        $nama=$data['tnama'];
        $email=$data['temail'];
        $telp=$data['ttelp'];
        $alamat=$data['talamat'];
        $kota=$data['tkota'];
        $provinsi=$data['tprov'];
        $gender=$data['tgender'];

        if($id!='') {
            $sql = "UPDATE member SET nama_member='$nama',email='$email',telp='$telp',alamat='$alamat',kota='$kota',provinsi='$provinsi',gender='$gender' WHERE id=$id";

            $this->db->query($sql);
            $this->db->execute();
        }
        else {
            return;
        }
    }

    public function delete($id) {
            
        $sql="delete from member where id='$id'";
        $hasil=$this->db->query($sql);
        $this->db->execute();		  
    }
}
?> 