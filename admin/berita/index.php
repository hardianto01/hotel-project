<?php require '../template/header.php' ?>

<?php $slide = get("SELECT * FROM berita ORDER BY id_news DESC"); ?>

<div class="card shadow p-3">
    <h5>Berita</h5>
</div>

<div class="card shadow p-3">

    <div class="mb-3">
        <a class="btn btn-primary" href="<?= $base_url; ?>admin/berita/tambah.php" role="button">Tambah</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered w-100" id="data-table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Tombol</th>
                    <th class="text-center">Urutan</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1 ?>
                <?php foreach ($slide as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td><?= $row['judul']; ?></td>
                        <td><?= $row['deskripsi']; ?></td>
                        <td class="text-center"><?= $row['tombol']; ?></td>
                        <td class="text-center"><?= $row['urutan']; ?></td>
                        <td class="text-center">
                            <img src="<?= $base_url; ?>/assets/uploads/berita/<?= $row['gambar']; ?>" alt="<?= $row['judul']; ?>" width="70">
                        </td>
                        <td class="text-center text-nowrap">

                            <a href="<?= $row['link']; ?>" class="btn btn-info me-1" target="_blank"><i class='bx bx-link-alt'></i></a>

                            <a class="btn btn-warning me-1" href="<?= $base_url; ?>admin/berita/ubah.php?id=<?= $row['id_news']; ?>" role="button"><i class='bx bx-edit-alt'></i></a>
                            <a class="btn btn-danger button-delete" href="<?= $base_url; ?>admin/berita/hapus.php?id=<?= $row['id_news']; ?>" role="button"><i class='bx bx-trash'></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>

</div>

<?php require '../template/footer.php' ?>