<?= $this->extend('layout/app_layout') ?>

<?= $this->section('title') ?>
    <title>List Buku</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-4">List Buku</h3>
        <div class="card mb-4">
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
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($buku as $item): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><img src="/uploads/covers/<?= $item['cover'] ?? 'no_cover.png'; ?>" alt="cover" width="60"></td>
                            <td><?= $item['judul']; ?></td>
                            <td><?= $item['nama_kategori']; ?></td>
                            <td><?= $item['penulis']; ?></td>
                            <td><?= $item['penerbit']; ?></td>
                            <td><?= $item['tahun_terbit']; ?></td>
                            <td><?= $item['deskripsi']; ?></td>
                            <td>
                                <a href="/pinjam/create/<?= $item['id']; ?>" class="btn btn-primary btn-sm">Pinjam</a>
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
