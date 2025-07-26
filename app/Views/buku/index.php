<?= $this->extend('layout/app_layout') ?>

<?= $this->section('title') ?>
    <title>Data Buku</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-4">Data Buku</h3>
        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-primary btn-sm" href="/buku/create">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Cover</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($buku as $item): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <img src="/uploads/covers/<?= $item['cover'] ?? 'no_cover.png'; ?>" alt="cover" width="60"></td>
                            <td><?= $item['judul']; ?></td>
                            <td><?= $item['nama_kategori']; ?></td>
                            <td><?= $item['penulis']; ?></td>
                            <td><?= $item['penerbit']; ?></td>
                            <td><?= $item['tahun_terbit']; ?></td>
                            <td>
                                <a href="/buku/show/<?= $item['id']; ?>" class="btn btn-success btn-sm m-1"><i class="fa-solid fa-eye"></i></a>
                                <a href="/buku/edit/<?= $item['id']; ?>" class="btn btn-primary btn-sm m-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a class="btn btn-danger btn-sm m-1 btn-delete" data-id="<?= $item['id']; ?>"> <i class="fa-solid fa-trash"></i>
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
                    window.location.href = "/buku/delete/" + id;
                }
            });
        }
    });
</script>
<?= $this->endSection() ?>