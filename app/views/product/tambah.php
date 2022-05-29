<div class="contentform">
    <div class="contenthead">
        <h2>Add Product</h2>
        <a href="<?= BASEURL; ?>/product" class="btn">Kembali</a>	
    </div>
    <form action="<?= BASEURL; ?>/product/inpProduct" method="post" enctype="multipart/form-data"> 
        <label for="nama">Nama Barang</label>
        <input type="text" id="nama" name="tnama">

        <label for="harga">Harga</label>
        <input type="text" id="harga" name="tharga"> 

        <label for="stok">Stok </label>
        <input type="text" id="stok" name="tstok"> 

        <label for="ket">Keterangan</label>
        <input type="text" id="ket" name="tket"> 

        <label for="foto" class="form-label">Gambar</label>
        <input type="file" id="foto" name="foto" > 

        <button type="submit">Add</button>	
	</form>
</div>