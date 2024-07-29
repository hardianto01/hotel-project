<?php require '../template/header.php' ?>

<?php $user = get("SELECT * FROM user ORDER BY id_user DESC"); ?>
<?php cekSuperadmin() ?>

<div class="card shadow p-3">
    <h5>User</h5>
</div>

<div class="card shadow p-3">

    <div class="mb-3">
        <a class="btn btn-primary" href="<?= $base_url; ?>admin/user/tambah.php" role="button">Tambah</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered w-100" id="data-table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1 ?>
                <?php foreach ($user as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td class="text-center"><?= $row['username']; ?></td>
                        <td class="text-start"><?= $row['nama']; ?></td>
                        <td class="text-center"><?= getRole($row['role']) ?></td>
                        <td class="text-center">
                            <?php if ($row['foto']) : ?>
                                <img src="<?= $base_url; ?>/assets/uploads/user/<?= $row['foto']; ?>" alt="<?= $row['nama']; ?>" width="70">
                            <?php else : ?>
                                <img src="<?= $base_url; ?>assets/img/noprofil.png" alt="<?= $row['nama']; ?>" width="70">
                            <?php endif ?>
                        </td>
                        <td class="text-center text-nowrap">
                            <a class="btn btn-warning me-1" href="<?= $base_url; ?>admin/user/ubah.php?id=<?= $row['id_user']; ?>" role="button"><i class='bx bx-edit-alt'></i></a>
                            <a class="btn btn-danger button-delete" href="<?= $base_url; ?>admin/user/hapus.php?id=<?= $row['id_user']; ?>" role="button"><i class='bx bx-trash'></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>

</div>

<?php require '../template/footer.php' ?>