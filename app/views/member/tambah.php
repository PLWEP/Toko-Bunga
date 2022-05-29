<div class="contentform">
    <div class="contenthead">
        <h2>Add Member</h2>
        <a href="<?= BASEURL; ?>/member" class="btn">Kembali</a>	
    </div>
    <form action="<?= BASEURL; ?>/member/inpMember" method="post" enctype="multipart/form-data"> 

        <label for="nama">Nama Member</label>
        <input type="text" id="nama" name="tnama">

        <label for="email">Email</label>
        <input type="text" id="email" name="temail"> 

        <label for="telp">Telp</label>
        <input type="text" id="telp" name="ttelp"> 

        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="talamat"> 

        <label for="kota">Kota</label>
        <input type="text" id="kota" name="tkota"> 

        <label for="provinsi">Provinsi</label>
        <input type="text" id="provinsi" name="tprov"> 

        <div class="radiobtn">
        <label for="gender">Gender</label>
            <input type="radio" id="gender" name="tgender" value="1">
            <p>Laki Laki</p>
            <input type="radio" id="gender" name="tgender" value="2"> 
            <p>Perempuan</p>
        </div>

        <button type="submit">Add</button>	
	</form>
</div>