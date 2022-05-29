<div class="product">
    <div class="contenthead">
        <h2>Product List</h2>
        <a href="<?= BASEURL; ?>/product/add" class="btn">Add Product</a>
    </div>
    <div class="datalist">
        <table>
            <tr>
                <th>Nama</th>
                <th>Action</th>
            </tr>
            <?php foreach ($data['product'] as $p): ?>
            <tr>
                <td><?= $p['nama'];?></td>
                <td>
                    <a href="<?= BASEURL; ?>/product/detail/<?= $p['id'];?>" class="btn">Detail</a>
                    <a href="<?= BASEURL; ?>/product/edit/<?= $p['id'];?>" class="btn">Edit</a>
                    <a href="<?= BASEURL; ?>/product/deleteProduct/<?= $p['id'];?>" class="btn">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>