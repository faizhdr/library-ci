<?= $this->extend('layout/app_layout') ?>

<?= $this->section('title') ?>
    <title>Edit Kategori</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-4">Edit Kategori</h3>
        <div class="card mb-4">
            <div class="card-body">
                <form action="/kategori/update/<?= $kategori['id'] ?>" method="post">
                    <div class="mb-3">
                        <label for="inputKategori" class="form-label">Kategori <span class="text-danger">*</span> </label>
                        <input type="text" name="nama_kategori" value="<?= old('nama_kategori', $kategori['nama_kategori']) ?>" class="form-control" id="inputKategori" placeholder="Nama Kategori...">
                        <?php if(session('validation') && session('validation')->hasError('nama_kategori')): ?>
                            <small class="text-danger"><?= session('validation')->getError('nama_kategori') ?></small><br>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="/kategori" class="btn btn-secondary btn-sm">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>