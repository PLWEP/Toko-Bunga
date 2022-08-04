<div class="product">
    <div class="contenthead">
        <h2>List Product</h2>
    </div>
    <div class="listdatabox">
        <?php foreach ($data['product'] as $p) :?>
        <div class="box">
            <div class="boxdata">
                <img src="<?= BASEURL; ?>/img/produk/<?= $p['foto']; ?>" alt="Photo"/>
                <h3><?= $p['nama']; ?></h3>
            </div>
            <div class="boxbtn">
                <a href="<?= BASEURL; ?>/product/detail/<?= $p['id'];?>" class="btn">Detail Produk</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
