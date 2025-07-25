<?= $this->extend('layout/app_layout') ?>

<?= $this->section('title') ?>
    <title>Tambah User</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-4">Tambah User</h3>
        <div class="card mb-4">
            <div class="card-body">
                <form action="/user/store" method="post">
                    <div class="mb-3">
                        <label for="inputNama" class="form-label">Nama <span class="text-danger">*</span> </label>
                        <input type="text" name="nama" value="<?= old('nama') ?>" class="form-control" id="inputNama" placeholder="Nama...">
                        <?php if(session('validation') && session('validation')->hasError('nama')): ?>
                            <small class="text-danger"><?= session('validation')->getError('nama') ?></small><br>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="inputRole" class="form-label">Role <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="admin" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Admin
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="user" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                User
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputUsername" class="form-label">Username <span class="text-danger">*</span> </label>
                        <input type="text" name="username" value="<?= old('username') ?>" class="form-control" id="inputUsername" placeholder="Username...">
                        <?php if(session('validation') && session('validation')->hasError('username')): ?>
                            <small class="text-danger"><?= session('validation')->getError('username') ?></small><br>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password <span class="text-danger">*</span> </label>
                        <input type="password" name="password" value="<?= old('password') ?>" class="form-control" id="inputPassword" placeholder="Password...">
                        <?php if(session('validation') && session('validation')->hasError('password')): ?>
                            <small class="text-danger"><?= session('validation')->getError('password') ?></small><br>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="/user" class="btn btn-secondary btn-sm">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>