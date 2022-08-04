<?php 

class ModelCart {
    private $table = 'keranjang';
    private $db;
    private $userid;
    private $cookie_name = 'keranjang';
    
    public function __construct() {
        $this->db = new Database;
    }

    public function getAllWithLogin($userid) {
        $this->userid = $userid;
        $this->updateData($userid);
        $sql = 'SELECT id, nama, harga, jumlah, keranjang_id  FROM ' . $this->table . ' join barang on keranjang.barang_id = barang.id WHERE member_id = ' . $this->userid;
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getAllWithoutLogin() {
        $sql = 'SELECT id, nama, harga, jumlah, keranjang_id FROM ' . $this->table . ' join barang on keranjang.barang_id = barang.id WHERE cookie_id = ' . $_COOKIE[$this->cookie_name];
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getByIdUser($userid, $barangid) {
        $this->userid = $userid;
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE member_id = '.$this->userid. ' and barang_id = '. $barangid;
        $this->db->query($sql);
        return $this->db->singleResultSet();
    }

    public function getByIdCookie($barangid) {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE cookie_id = '.$_COOKIE[$this->cookie_name].' and barang_id = '. $barangid;
        $this->db->query($sql);
        return $this->db->singleResultSet();
    }

    public function getByIdCart($keranjang_id) {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE keranjang_id = '.$keranjang_id;
        $this->db->query($sql);
        return $this->db->singleResultSet();
    }

    public function addWithLogin($data, $userid) {
        $this->userid = $userid;
        $barangid =  $data['barangid'];
        $jumlah = $data['jumlah'];
        if ($this->getByIdUser($this->userid, $barangid) > 0) {
            $sql = 'UPDATE keranjang SET jumlah = jumlah + :jumlah WHERE member_id = '.$this->userid. ' and barang_id = :barangid';
        } else {
            $sql = 'INSERT INTO ' . $this->table. ' (member_id,barang_id,jumlah) values ( '. $this->userid .', :barangid, :jumlah)';
        }

        $this->db->query($sql);
        $this->db->bind('barangid',$barangid);
        $this->db->bind('jumlah',$jumlah);
        $this->db->execute();
    }
    
    public function addWithoutLogin($data) {
        $barangid =  $data['barangid'];
        $jumlah = $data['jumlah'];
        if ($this->getByIdCookie($barangid) > 0) {
            $sql = 'UPDATE keranjang SET jumlah = jumlah + :jumlah WHERE cookie_id = '.$_COOKIE[$this->cookie_name]. ' and barang_id = :barangid';
        } else {
            $sql = 'INSERT INTO ' . $this->table. ' (barang_id,cookie_id,jumlah) values ( :barangid,'.$_COOKIE[$this->cookie_name].',:jumlah)';
        }

        $this->db->query($sql);
        $this->db->bind('barangid',$barangid);
        $this->db->bind('jumlah',$jumlah);
        $this->db->execute();
    }

    public function deleteAll() {
        $sql='DELETE FROM '.$this->table;
        $this->db->query($sql);
        $this->db->execute();	
    }

    public function deleteItem($keranjang_id) {
        $sql='DELETE FROM '.$this->table.' WHERE keranjang_id = :keranjang_id';
        $this->db->query($sql);
        $this->db->bind('keranjang_id',$keranjang_id);
        $this->db->execute();	
    }

    public function updateData($userid) {
        $sql = 'UPDATE keranjang SET member_id = :member_id WHERE cookie_id = '.$_COOKIE[$this->cookie_name];
        $this->db->query($sql);
        $this->db->bind('member_id',$userid);
        $this->db->execute();
    }
}
?>