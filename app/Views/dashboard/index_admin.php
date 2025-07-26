<?= $this->extend('layout/app_layout') ?>

<?= $this->section('title') ?>
    <title>Dashboard</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-4">Dashboard</h3>
        <!-- Statistics Cards -->
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card stat-card border-0 shadow">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="stat-icon bg-primary bg-opacity-10 p-2 rounded text-primary">
                                <i class="fa-solid fa-book"></i>
                            </div>
                        </div>
                        <div class="d-sm-flex d-block align-items-center justify-content-between">
                            <h6 class="underline mb-2 "><a href="/buku" class="text-muted">Total Buku</a></h6>
                            <h4 class="mb-3 me-4"><?= $total_buku ?></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card stat-card border-0 shadow">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="stat-icon bg-success bg-opacity-10 p-2 rounded text-success">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                        <div class="d-sm-flex d-block align-items-center justify-content-between">
                            <h6 class="underline mb-2 "><a href="/user" class="text-muted">Total User</a></h6>
                            <h4 class="mb-3 me-4"><?= $total_user ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card stat-card border-0 shadow">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="stat-icon bg-warning bg-opacity-10 p-2 rounded text-warning">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                        </div>
                        <div class="d-sm-flex d-block align-items-center justify-content-between">
                            <h6 class="underline mb-2 "><a href="/kategori" class="text-muted">Total Kategori</a></h6>
                            <h4 class="mb-3 me-4"><?= $total_kategori ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card stat-card border-0 shadow">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="stat-icon bg-info bg-opacity-10 p-2 rounded text-info">
                                <i class="fa-solid fa-address-book"></i>
                            </div>
                        </div>
                        <div class="d-sm-flex d-block align-items-center justify-content-between">
                            <h6 class="underline mb-2 "><a href="/pinjam" class="text-muted">Total Pinjam</a></h6>
                            <h4 class="mb-3 me-4"><?= $total_pinjam ?></h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card mt-4">
            <div class="card-header">
                Daftar Pinjam
            </div>  
            <div class="card-body">
                <table class="table table-striped" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Cover</th>
                            <th>Judul</th>
                            <th>Tanggal Mulai Pinjam</th>
                            <th>Tanggal Selesai Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($pinjam as $item): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $item['nama_user']; ?></td>
                            <td><img src="/uploads/covers/<?= $item['cover'] ?? 'no_cover.png'; ?>" alt="cover" width="60"></td>
                            <td><?= $item['judul']; ?></td>
                            <td><?= $item['tanggal_mulai']; ?></td>
                            <td><?= $item['tanggal_selesai']; ?></td>
                            <td>
                                <?php if($item['status'] == 'accepted'): ?>
                                    <span class="badge rounded-pill text-bg-success">Accepted</span>
                                <?php elseif($item['status'] == 'process'): ?>
                                    <span class="badge rounded-pill text-bg-warning">Process</span>
                                <?php else: ?>
                                    <span class="badge rounded-pill text-bg-danger">Rejected</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <form action="/dashboard_admin/update_status/<?= $item['pinjam_id']; ?>" method="post" class="d-inline">
                                    <input type="hidden" name="status" value="accepted">
                                    <button type="submit" class="btn btn-success btn-sm m-1">Accepted</button>
                                </form>

                                <form action="/dashboard_admin/update_status/<?= $item['pinjam_id']; ?>" method="post" class="d-inline">
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="btn btn-danger btn-sm m-1">Rejected</button>
                                </form>
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