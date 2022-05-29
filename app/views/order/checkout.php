<div class="chekout">
    <div class="contenthead">
        <h2>CheckOut</h2>
        <a href="<?= BASEURL; ?>/transaction" class="btn">Kembali</a>	
    </div>
    <div class="checkout-content">
        <div class="keranjang">
            <div class="contenthead">
                <h2>Barang</h2>
            </div>
            <div class="datalist">
                <table>
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                    <?php foreach ($data['cart'] as $c): ?>
                    <tr>
                        <td><?= $c['nama'];?></td>
                        <td><?= $c['jumlah'];?></td>
                        <td><?= $c['harga'];?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="form-checkout">
            <div class="contenthead">
                <h2>Form CheckOut</h2>
            </div>
            <div class="contentform">
                <form action="<?= BASEURL; ?>/transaction/addOrder/" method="post" enctype="multipart/form-data"> 
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="tnama" value="<?= $data['member']['nama_member']; ?>" readonly require >

                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="talamat" value="<?= $data['member']['alamat'];?>" readonly require>

                    <label for="telp">Telepon</label>
                    <input type="text" id="telp" name="ttelp"  value="<?= $data['member']['telp'];?>" readonly require> 

                    <label for="jumlah">Jumlah Barang</label>
                    <input type="text" id="jumlah" name="tjumlah"  value="<?= $data['stock'];?>" readonly require> 

                    <label for="total">Total Harga</label>
                    <input type="text" id="total" name="ttotal"  value="<?= $data['price'];?>" readonly require> 

                    <div class="radiobtn">
                        <label for="kurir">Kurir</label>
                        <input type="radio" id="kurir" name="tkurir" value="SiCepat" checked  >
                        <p>SiCepat</p>
                        <input type="radio" id="kurir" name="tkurir" value="JNE"> 
                        <p>JNE</p>
                    </div>

                    <button type="submit">Checkout</button>	
                </form>
            </div>
        </div>
    </div>
</div>