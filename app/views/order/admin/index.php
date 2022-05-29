<div class="order">
    <div class="contenthead">
        <h2>Order List</h2>
    </div>
    <div class="datalist">
        <table>
            <tr>
                <th>Id Pesanan</th>
                <th>Barang</th>
                <th>Penerima</th>
                <th>Jumlah Barang</th>
                <th>Total Harga</th>
                <th>Kurir</th>
            </tr>
            <?php foreach ($data['order'] as $c): ?>
            <tr>
                <td><?= $c['id_pesanan'];?></td>
                <td><?= $c['nama_barang']; ?> </td>
                <td>
                    <?= $c['nama_member'];?> <br>
                    <?= $c['alamat'];?> <br>
                    <?= $c['telp'];?>    
                </td>
                <td><?= $c['total_barang'];?></td>
                <td><?= $c['total_harga'];?></td>
                <td><?= $c['kurir'];?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>