<div class="keranjang">
    <div class="contenthead">
        <h2>Cart List</h2>
        <a href="<?= BASEURL; ?>/cart/checkOut" class="btn">Checkout</a>
    </div>
    <div class="datalist">
        <table>
            <tr>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Action</th>
                
            </tr>
            <?php foreach ($data['cart'] as $c): ?>
            <tr>
                <td><?= $c['nama'];?></td>
                <td><?= $c['jumlah'];?></td>
                <td><?= $c['harga'];?></td>
                <td>
                    <a href="<?= BASEURL; ?>/product/detail/<?= $c['id'];?>" class="btn">Edit</a>
                    <a href="<?= BASEURL; ?>/cart/deleteItem/<?= $c['keranjang_id'];?>" class="btn">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td>Total : </td>
                <td> <?= $data['price']; ?> </td>
                <td></td>
            </tr>
        </table>
    </div>
</div>