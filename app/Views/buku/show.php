<?= $this->extend('layout/app_layout') ?>

<?= $this->section('title') ?>
    <title>Detail Buku</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-4">Detail Buku</h3>
        <a href="/buku" class="btn btn-secondary btn-sm mb-3"><< Kembali</a>
        <div class="card p-4" style="width: fit-content;">
            <div class="d-sm-flex d-block align-items-center justify-content-between">
                <div class="me-5">
                    <img width="120" src="/uploads/covers/<?= $buku['cover'] ?? 'no_cover.png'; ?>" alt="image">
                </div>
                <div>
                    <table>
                        <tr>
                            <td height="40" width="120" class="fw-bold">Judul</td>
                            <td width="20" class="fw-bold">:</td>
                            <td><?= $buku['judul'] ?></td>
                        </tr>
                        <tr>
                            <td height="40" width="120" class="fw-bold">Kategori</td>
                            <td width="20" class="fw-bold">:</td>
                            <td><?= $buku['nama_kategori'] ?></td>
                        </tr>
                        <tr>
                            <td height="40" width="120" class="fw-bold">Penulis</td>
                            <td width="20" class="fw-bold">:</td>
                            <td><?= $buku['penulis'] ?></td>
                        </tr>
                        <tr>
                            <td height="40" width="120"  class="fw-bold">Penerbit</td>
                            <td width="20" class="fw-bold">:</td>
                            <td><?= $buku['penerbit'] ?></td>
                        </tr>
                        <tr>
                            <td height="40" width="120" class="fw-bold">Tahun Terbit</td>
                            <td width="20" class="fw-bold">:</td>
                            <td><?= $buku['tahun_terbit'] ?></td>
                        </tr>
                        <tr>
                            <td height="40" width="120" class="fw-bold">Deskripsi</td>
                            <td width="20" class="fw-bold">:</td>  
                            <td><?= $buku['deskripsi'] ?></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>