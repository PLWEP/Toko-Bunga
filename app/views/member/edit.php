<div class="contentform">
    <div class="contenthead">
        <h2>Edit Member</h2>
        <a href="<?= BASEURL; ?>/member" class="btn">Kembali</a>	
    </div>
    <form action="<?= BASEURL; ?>/member/editMember" method="post" enctype="multipart/form-data"> 
        <label for="id">ID</label>
        <input type="text" id="id" name="tid" value="<?= $data['member']['id'];?>" readonly >

        <label for="nama">Nama Member</label>
        <input type="text" id="nama" name="tnama" value="<?= $data['member']['nama_member'];?>">

        <label for="email">Email</label>
        <input type="text" id="email" name="temail"  value="<?= $data['member']['email'];?>"> 

        <label for="telp">Telp</label>
        <input type="text" id="telp" name="ttelp"  value="<?= $data['member']['telp'];?>"> 

        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="talamat" value="<?= $data['member']['alamat'];?>"> 

        <label for="kota">Kota</label>
        <input type="text" id="kota" name="tkota" value="<?= $data['member']['kota'];?>"> 

        <label for="provinsi">Provinsi</label>
        <input type="text" id="provinsi" name="tprov" value="<?= $data['member']['provinsi'];?>"> 

        <div class="radiobtn">
        <label for="gender">Gender</label>
            <input type="radio" id="gender" name="tgender" value="1" <?php if ($data['member']['gender'] == 1) echo 'checked';?>>
            <p>Laki Laki</p>
            <input type="radio" id="gender" name="tgender" value="2" <?php if ($data['member']['gender'] == 2) echo 'checked';?>> 
            <p>Perempuan</p>
        </div>

        <button type="submit">Update</button>	
	</form>
</div>