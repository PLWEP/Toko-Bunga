<?php 

class ModelOrder {
    private $table = 'pesanan';
    private $db;
    private $userid;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll($userid) {
        $this->userid = $userid;
        $sql = 'SELECT id_pesanan, nama_barang, nama_member, alamat, telp, total_barang, total_harga, kurir FROM ' . $this->table . ' join member on pesanan.member_id = member.id WHERE member_id = ' . $this->userid;
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getAllAdmin() {
        $sql = 'SELECT id_pesanan, nama_barang, nama_member, alamat, telp, total_barang, total_harga, kurir FROM ' . $this->table . ' join member on pesanan.member_id = member.id';
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function add($data, $userid) {
        $this->userid = $userid;
        $namabarang=$data['namabarang'];
        $jumlah=$data['jumlahbrg'];
        $total=$data['totalhrg'];
        $kurir=$data['kurir'];

        $this->db->query('SELECT if(max(id_pesanan)is null,1,max(id_pesanan)+1) as maks_id  FROM ' . $this->table);
            $data=$this->db->resultSet();
            foreach ($data as $rec){
                $id=$rec["maks_id"];
        }
        
        $sql = 'INSERT INTO ' . $this->table. ' (id_pesanan,member_id,nama_barang, total_barang,total_harga,kurir) values ( :id ,'. $this->userid .', :namabarang, :jumlah, :total_harga, :kurir)';
        $this->db->query($sql);
        $this->db->bind('id', $id);
        $this->db->bind('namabarang',$namabarang);
        $this->db->bind('jumlah',$jumlah);
        $this->db->bind('total_harga',$total);
        $this->db->bind('kurir',$kurir);
        $res=$this->db->execute();
    }
}
?>