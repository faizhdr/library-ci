<?= $this->extend('layout/app_layout') ?>

<?= $this->section('title') ?>
<title>Data Kategori</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-4">Data Kategori</h3>
        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-primary btn-sm" href="/kategori/create">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Dibuat</th>
                            <th>Diupdate</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kategori as $item): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $item['nama_kategori']; ?></td>
                                <td><?= $item['created_at']; ?></td>
                                <td>
                                    <?php if ($item['updated_at'] == null): ?>
                                        -
                                    <?php else: ?>
                                        <?= $item['updated_at']; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="/kategori/edit/<?= $item['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a class="btn btn-danger btn-sm btn-delete" data-id="<?= $item['id']; ?>"> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>


<?= $this->section('script') ?>
<script>
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("btn-delete")) {
            let id = e.target.dataset.id;

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data kategori akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/kategori/delete/" + id;
                }
            });
        }
    });
</script>
<?= $this->endSection() ?>