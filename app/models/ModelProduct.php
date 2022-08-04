<?php
	class ModelProduct{
		private $table = "barang";
		private $db;

		public function __construct() {
			$this->db = new Database;
		}

		public function getAll() { 
			$this->db->query('SELECT * FROM ' . $this->table);
			return  $this->db->resultSet();
		}

		public function getbyId($id) {
			$sql="SELECT * FROM " . $this->table . " WHERE id=:id";
			$this->db->query($sql);
			$this->db->bind('id',$id);
			return $this->db->singleResultSet();
		}

		public function decStock($data) {
			$id = $data['barangid'];
			$jml = $data['jumlah'];
			$produk = $this->getById($id);
			$stok = $produk['stok'] - $jml;

			$this->db->query('UPDATE '. $this->table .' SET stok = '.$stok.' WHERE barang.id = '.$id.'');
			$this->db->execute();
		}

		public function upStock($data) {
			var_dump($data);
			$id = $data['barang_id'];
			$jml = $data['jumlah'];
			$produk = $this->getById($id);
			$stok = $produk['stok'] + $jml;

			$this->db->query('UPDATE '. $this->table .' SET stok = '.$stok.' WHERE barang.id = '.$id.'');
			$this->db->execute();
		}
	}
?>