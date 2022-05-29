<?php 

class ModelCart {
    private $table = 'keranjang';
    private $db;
    private $userid;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll($userid) {
        $this->userid = $userid;
        $sql = 'SELECT id, nama, harga, jumlah FROM ' . $this->table . ' join barang on keranjang.barang_id = barang.id WHERE member_id = ' . $this->userid;
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getById($userid, $barangid) {
        $this->userid = $userid;
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE member_id = '.$this->userid. ' and barang_id = '. $barangid;
        $this->db->query($sql);
        return $this->db->singleResultSet();
    }

    public function add($data, $userid) {
        $this->userid = $userid;
        $barangid =  $data['barangid'];
        $jumlah = $data['jumlah'];
        if ($this->getById($this->userid, $barangid) > 0) {
            $sql = 'UPDATE keranjang SET jumlah = jumlah + :jumlah WHERE member_id = '.$this->userid. ' and barang_id = :barangid';
        } else {
            $sql = 'INSERT INTO ' . $this->table. ' (member_id,barang_id,jumlah) values ( '. $this->userid .', :barangid, :jumlah)';
        }

        $this->db->query($sql);
        $this->db->bind('barangid',$barangid);
        $this->db->bind('jumlah',$jumlah);
        $res=$this->db->execute();
    }

    public function deleteAll() {
        $sql='DELETE FROM '.$this->table;
        $hasil=$this->db->query($sql);
        $this->db->execute();	
    }
}
?>