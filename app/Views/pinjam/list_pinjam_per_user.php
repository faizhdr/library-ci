<?= $this->extend('layout/app_layout') ?>

<?= $this->section('title') ?>
    <title>List Pinjam</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-4">List Pinjam</h3>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-striped" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Cover</th>
                            <th>Judul</th>
                            <th>Tanggal Mulai Pinjam</th>
                            <th>Tanggal Selesai Pinjam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($pinjam as $item): ?>
                        <tr>
                            <td><?= $i++; ?></td>
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
                        </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>
