<div class="detail">
    <div class="contenthead">
        <h2>Detail Product</h2>
        <a href="<?= BASEURL; ?>/product" class="btn">Kembali</a>
    </div>
    <div class="detailproduct">
        <div class="detailhead">
            <h2><?= $data['product']['nama']; ?></h2>
        </div>
        <div class="detailcontent">
            <div class="photo">
                <img src="<?= BASEURL; ?>/img/daun/<?= $data['product']['foto']; ?>" alt="Photo"/>
            </div>
            <div class="description">
                <h3>Rp. <?= number_format($data['product']['harga']);?></h3>
                <p>Stok :  <?= $data['product']['stok']; ?></p>
                <p>keterangan :  <?= $data['product']['keterangan']; ?></p>
            </div>
        </div>
    </div>
</div>

