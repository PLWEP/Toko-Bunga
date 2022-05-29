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
	
		public function uploadFoto($ft) {
			$namaFile = $ft['name'];
			$namaSementara = $ft['tmp_name'];

			$dirUpload = "img/daun/";

			$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
			if ($terupload) {
				return true;
			} else {
				return false;
			}
		}

		public function add($data,$ff) {
			$hasil=$this->uploadFoto($ff);
			if ($hasil){
				$foto=$ff['name'];	
				$nama = $data['tnama'];
				$harga = $data['tharga'];
				$stok = $data['tstok'];
				$keterangan = $data['tket'];

				// Auto increment id
				$this->db->query('SELECT if(max(id)is null,1,max(id)+1) as maks_id  FROM ' . $this->table);
				$data=$this->db->resultSet();
				foreach ($data as $rec){
					$id=$rec["maks_id"];
				}		  
				
				// Add data ke barang
				$this->db->query('INSERT INTO ' . $this->table . ' (id,nama, harga,stok,keterangan,foto)
				VALUES(:id,:nama,:harga, :stok,:keterangan,:foto)');
				$this->db->bind('id',$id);
				$this->db->bind('nama',$nama);
				$this->db->bind('harga',$harga);
				$this->db->bind('stok',$stok);
				$this->db->bind('keterangan',$keterangan);
				$this->db->bind('foto',$foto);
				$res=$this->db->execute();

				return true;
			}else
				return false;
		}

		public function edit($data,$ff) {
			$id=$data["tid"];
			$nama=$data['tnama'];
			$hrg=$data['tharga'];
			$stok=$data['tstok'];
			$keterangan=$data['tket'];				  
			$foto_lama=$data['foto_lama'];				

			// update data dari barang detail
			if(isset($data['ubah_foto'])){ 
				if ($this->uploadFoto($ff)){
					$foto=$ff['name'];	

					$this->db->query("update barang set nama='$nama',stok='$stok',harga='$hrg',keterangan='$keterangan' where id='$id'");
					$hasil=$this->db->execute();

					unlink("img/daun/".$foto_lama);		 		 			
				}	
			}else{
				$this->db->query("update barang set nama='$nama',stok='$stok',harga='$hrg',keterangan='$keterangan' where id='$id'");
				$hasil=$this->db->execute();
			}
		}

		public function delete($id){
			$data['produk']=$this->getById($id);
			$foto=$data['produk']['foto'];

			// delete barang
			$hasil=$this->db->query("delete from barang where id='$id'");
			$this->db->execute();		

			if ($foto!=""){
				unlink("img/daun/".$foto);
			}		  
		}

		public function decStock($data) {
			$id = $data['barangid'];
			$jml = $data['jumlah'];
			$produk = $this->getById($id);
			$stok = $produk['stok'] - $jml;

			$this->db->query('UPDATE '. $this->table .' SET stok = '.$stok.' WHERE barang.id = '.$id.'');
			$this->db->execute();
		}
	}
?>