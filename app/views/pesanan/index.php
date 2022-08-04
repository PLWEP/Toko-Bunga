<div class="pesanan">
    <div class="contenthead">
        <h2>List Pesanan</h2>
    </div>
    <div class="datalist">
        <table>
            <tr>
                <th>Id</th>
                <th>Barang</th>
                <th>Total Harga</th>
                <th>Kurir</th>
                <th>Jenis Pembayaran</th>
                <th>Alamat</th>
                
            </tr>
            <?php foreach ($data['detail'] as $c): ?>
            <tr>
                <td><?= $c[0]['id_pesanan'];?></td>
                <td>
                    <?php foreach ($data['order'] as $o): ?>
                        <div class="tabelbarang">
                            <?php if($c[0]['id_pesanan'] == $o['id_pesanan']) :?>
                            <h3><?= $o['nama'];?></h3>
                            <p>x<?= $o['jumlah'];?></p>
                            <p>Harga Satuan : </p>
                            <p><?= $o['harga'];?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </td>
                <td><?= $c[0]['total'];?></td>
                <td><?= $c[0]['kurir'];?></td>
                <td><?= $c[0]['jenis_pembayaran'];?></td>
                <td><?= $c[0]['alamat'];?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>