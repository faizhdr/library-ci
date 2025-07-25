<?= $this->extend('layout/app_layout') ?>

<?= $this->section('title') ?>
    <title>Edit Buku</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-4">Edit Buku</h3>
        <div class="card mb-4">
            <div class="card-body">
                <form action="/buku/update/<?= $buku['id'] ?>" method="post" enctype="multipart/form-data">
                    <?php csrf_field() ?>

                    <div class="mb-3">
                        <label for="inputCover" class="form-label">Cover Buku</label>
                        <input type="file" name="cover" id="inputCover" class="form-control">

                        <?php if($buku['cover']): ?>
                            <img src="/uploads/covers/<?= $buku['cover']; ?>" alt="cover" class="mt-2" width="80">
                        <?php endif; ?>

                        <?php if(isset($validation) && $validation->hasError('cover')): ?>
                            <div class="text-danger"><?= $validation->getError('cover'); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="inputJudul" class="form-label">Judul <span class="text-danger">*</span> </label>
                        <input type="text" name="judul" value="<?= $buku['judul'] ?>" class="form-control" id="inputJudul" placeholder="Judul Buku...">
                        <?php if(session('validation') && session('validation')->hasError('judul')): ?>
                            <small class="text-danger"><?= session('validation')->getError('judul') ?></small><br>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori Buku <span class="text-danger">*</span></label>
                        <select name="kategori_id" id="kategori_id" class="form-select">
                            <option value="" selected disabled>-- Pilih Kategori --</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id']; ?>" <?= $buku['kategori_id'] == $k['id'] ? 'selected' : '' ?>><?= $k['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputPenulis" class="form-label">Penulis <span class="text-danger">*</span> </label>
                        <input type="text" name="penulis" value="<?= $buku['penulis'] ?>" class="form-control" id="inputPenulis" placeholder="Penulis Buku...">
                        <?php if(session('validation') && session('validation')->hasError('penulis')): ?>
                            <small class="text-danger"><?= session('validation')->getError('penulis') ?></small><br>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="inputPenerbit" class="form-label">Penerbit <span class="text-danger">*</span></label>
                        <input type="text" name="penerbit" value="<?= $buku['penerbit'] ?>" class="form-control" id="inputPenerbit" placeholder="Penerbit Buku...">
                        <?php if(session('validation') && session('validation')->hasError('penerbit')): ?>
                            <small class="text-danger"><?= session('validation')->getError('penerbit') ?></small><br>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="inputTahunTerbit" class="form-label">Tahun Terbit <span class="text-danger">*</span> </label>
                        <input type="number" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>" class="form-control" id="inputTahunTerbit" placeholder="Tahun Terbit Buku...">
                        <?php if(session('validation') && session('validation')->hasError('tahun_terbit')): ?>
                            <small class="text-danger"><?= session('validation')->getError('tahun_terbit') ?></small><br>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="inputDeskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="inputDeskripsi" rows="3"><?= $buku['deskripsi'] ?></textarea>
                        <?php if(session('validation') && session('validation')->hasError('deskripsi')): ?>
                            <small class="text-danger"><?= session('validation')->getError('deskripsi') ?></small><br>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="/buku" class="btn btn-secondary btn-sm">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>