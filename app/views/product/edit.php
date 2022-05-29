<div class="contentform">
    <div class="contenthead">
        <h2>Edit Product</h2>
        <a href="<?= BASEURL; ?>/product" class="btn">Kembali</a>	
    </div>
    <form action="<?= BASEURL; ?>/product/editProduct" method="post" enctype="multipart/form-data"> 
        <label for="id">ID</label>
        <input type="text" id="id" name="tid" value="<?= $data['product']['id'];?>" readonly >

        <label for="nama">Nama Barang</label>
        <input type="text" id="nama" name="tnama" value="<?= $data['product']['nama'];?>">

        <label for="harga">Harga</label>
        <input type="text" id="harga" name="tharga"  value="<?= $data['product']['harga'];?>"> 

        <label for="stok">Jumlah</label>
        <input type="text" id="stok" name="tstok"  value="<?= $data['product']['stok'];?>"> 

        <label for="ket">Keterangan</label>
        <input type="text" id="ket" name="tket"  value="<?= $data['product']['keterangan'];?>"> 

        <label for="l6" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="foto" name="foto" > 

        <input type='hidden' name='foto_lama' value="<?=  $data['product']['foto'];?>">
        <img src="<?= BASEURL; ?>/img/daun/<?php echo $data['product']['foto']; ?>" width="150px" height="120px" />		  
		<input type="checkbox" name="ubah_foto" value="true">Ceklis jika ingin mengubah foto<br>

        <button type="submit">Update</button>	
	</form>
</div>