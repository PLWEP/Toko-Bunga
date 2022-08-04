<div class="detail">
    <div class="contenthead">
        <h2>Detail Produk</h2>
        <a href="<?= BASEURL; ?>/product" class="btn">Kembali</a>
    </div>
    <div class="detailproduct">
        <div class="detailhead">
            <h2><?= $data['product']['nama']; ?></h2>
        </div>
        <div class="detailcontent">
            <div class="photo">
                <img src="<?= BASEURL; ?>/img/produk/<?= $data['product']['foto']; ?>" alt="Photo"/>
            </div>
            <div class="description">
                <h3>Rp. <?= number_format($data['product']['harga']);?></h3>
                <p>Stok :  <?= $data['product']['stok']; ?></p>
                <p>keterangan :  <?= $data['product']['keterangan']; ?></p>
                <div class="order">
                    <form action="<?= BASEURL; ?>/cart/addCart/<?= $data['product']['id']; ?> " method="POST">
                        <label for="jumlah">Jumlah : </label>
                        <input type="number" id="jumlah" name="jumlah" min="1" max="<?= $data['product']['stok']; ?>" value="1">
                        <button type="submit">Masukan Keranjang</button>	
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>