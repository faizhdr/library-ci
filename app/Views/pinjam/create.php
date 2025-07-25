<?= $this->extend('layout/app_layout') ?>

<?= $this->section('title') ?>
    <title>Pinjam Buku</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-4">Pinjam Buku</h3>
        <div class="card p-4" style="width: fit-content;">
            <div class="d-sm-flex d-block align-items-center justify-content-between">
                <div class="me-5">
                    <img width="120" src="/uploads/covers/<?= $pinjam['cover'] ?? 'no_cover.png'; ?>" alt="image">
                </div>
                <div>
                    <table>
                        <tr>
                            <td height="40" width="120" class="fw-bold">Judul</td>
                            <td width="20" class="fw-bold">:</td>
                            <td><?= $pinjam['judul'] ?></td>
                        </tr>
                        <tr>
                            <td height="40" width="120" class="fw-bold">Kategori</td>
                            <td width="20" class="fw-bold">:</td>
                            <td><?= $pinjam['nama_kategori'] ?></td>
                        </tr>
                        <tr>
                            <td height="40" width="120" class="fw-bold">Penulis</td>
                            <td width="20" class="fw-bold">:</td>
                            <td><?= $pinjam['penulis'] ?></td>
                        </tr>
                        <tr>
                            <td height="40" width="120"  class="fw-bold">Penerbit</td>
                            <td width="20" class="fw-bold">:</td>
                            <td><?= $pinjam['penerbit'] ?></td>
                        </tr>
                        <tr>
                            <td height="40" width="120" class="fw-bold">Tahun Terbit</td>
                            <td width="20" class="fw-bold">:</td>
                            <td><?= $pinjam['tahun_terbit'] ?></td>
                        </tr>
                        <tr>
                            <td height="40" width="120" class="fw-bold">Deskripsi</td>
                            <td width="20" class="fw-bold">:</td>  
                            <td><?= $pinjam['deskripsi'] ?></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="/pinjam/store" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="buku_id" value="<?= $pinjam['id']; ?>">
                    

                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputTanggalMulai" class="form-label">Tanggal Mulai Pinjam<span class="text-danger">*</span> </label>
                            <input type="date" name="tanggal_mulai" value="<?= old('tanggal_mulai') ?>" class="form-control" id="inputTanggalMulai">
                            <?php if(session('validation') && session('validation')->hasError('tanggal_mulai')): ?>
                                <small class="text-danger"><?= session('validation')->getError('tanggal_mulai') ?></small><br>
                            <?php endif; ?>
                        </div>
                        <div class="col">
                            <label for="inputTanggalSelesai" class="form-label">Tanggal Selesai Pinjam<span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_selesai" value="<?= old('tanggal_selesai') ?>" class="form-control" id="inputTanggalSelesai">
                            <?php if(session('validation') && session('validation')->hasError('tanggal_selesai')): ?>
                                <small class="text-danger"><?= session('validation')->getError('tanggal_selesai') ?></small><br>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="/list_buku" class="btn btn-secondary btn-sm">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>