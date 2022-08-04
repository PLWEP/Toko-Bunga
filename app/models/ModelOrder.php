<?php 

class ModelOrder {
    private $tableOrder = 'pesanan';
    private $tableDetail = 'detailpesanan';
    private $db;
    private $userid;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllOrder($userid) {
        $this->userid = $userid;
        $sql = 'SELECT id_pesanan, jumlah, harga, nama FROM ' . $this->tableOrder . ' join barang on pesanan.barang_id = barang.id WHERE member_id = ' . $this->userid;
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getAllDetail($orderid) {
        $sql = 'SELECT * FROM ' . $this->tableDetail . ' WHERE id_pesanan = ' . $orderid;
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function add($data, $userid) {
        $this->userid = $userid;
        $Order = $this->addOrder($data['cart'], $userid);
        $this->addDetail($data,$Order);
    }

    public function addOrder($data, $userid) {
        $this->userid = $userid;

        $this->db->query('SELECT if(max(id_pesanan)is null,1,max(id_pesanan)+1) as maks_id  FROM ' . $this->tableOrder);
            $id=$this->db->resultSet();
            foreach ($id as $rec){
                $id=$rec["maks_id"];
        }

        foreach($data as $d) {
            $barangid = $d['id'];
            $jumlah = $d['jumlah'];

            $sql = 'INSERT INTO ' . $this->tableOrder. ' (id_pesanan,member_id,barang_id, jumlah) values ( :id , '. $this->userid .', :barangid, :jumlah)';
            $this->db->query($sql);
            $this->db->bind('id', $id);
            $this->db->bind('barangid', $barangid);
            $this->db->bind('jumlah', $jumlah);
            $this->db->execute();
        }

        return $id;
    }

    public function addDetail($data, $idpesanan) {
        $id = $idpesanan;
        $total=$data['total'];
        $kurir=$data['kurir'];
        $alamat= $data['alamat'];
        $pembayaran= $data['pembayaran'];

        $sql = 'INSERT INTO ' . $this->tableDetail. ' (id_pesanan,total,kurir,alamat,jenis_pembayaran) values ( :id , :total, :kurir, :alamat, :pembayaran)';
        $this->db->query($sql);
        $this->db->bind('id', $id);
        $this->db->bind('total', $total);
        $this->db->bind('kurir', $kurir);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('pembayaran', $pembayaran);
        $res=$this->db->execute();
    }
}
?>