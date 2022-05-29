<div class="member">
    <div class="contenthead">
        <h2>Member List</h2>
        <a href="<?= BASEURL; ?>/member/add" class="btn">Add Member</a>
    </div>
    <div class="listdatabox">
        <?php foreach ($data['member'] as $m): ?>
        <div class="box">
            <div class="boxdata">
                <h3><?= $m['nama_member'] ?></h3>
                <p>Email : <?= $m['email'] ?></p>
                <p>Telephone : <?= $m['telp'] ?></p>
                <p>Address : <?= $m['alamat'] ?>, <?= $m['kota'] ?>, <?= $m['provinsi'] ?></p>
            </div>
            <div class="boxbtn">
                <a href="<?= BASEURL; ?>/member/edit/<?= $m['id'];?>" class="btn">Edit</a>
                <a href="<?= BASEURL; ?>/member/deletemember/<?= $m['id'];?>" class="btn">Delete</a>   
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>