
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="<?= base_url('assets/img/favicon.ico') ?>" type="image/x-icon">
        <?= $this->renderSection('title') ?>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <span class="navbar-brand ps-3"><i class="fa-solid fa-book"></i> E-Library</span>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li class="dropdown-item">
                            <i class="fa fa-user"></i> &nbsp; <?= session()->get('nama') ?>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><button class="dropdown-item text-danger btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</button></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php if (session()->get('role') == 'admin'): ?>
                    <?= $this->include('layout/sidebar_admin') ?>
                <?php else: ?>
                    <?= $this->include('layout/sidebar_user') ?>
                <?php endif; ?>
            </div>
            <div id="layoutSidenav_content">
                <?= $this->renderSection('content') ?>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="text-center small">
                            <div class="text-muted">Copyright &copy; library - faizhaidar 2025</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <?= $this->renderSection('script') ?>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const logoutButtons = document.querySelectorAll('.btn-logout');

                logoutButtons.forEach(btn => {
                    btn.addEventListener('click', function () {
                        let id = this.dataset.id;

                        Swal.fire({
                            title: "Apakah yakin ingin logout?",
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya logout!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/logout";
                            }
                        });
                    });
                });
            });
        </script>
        

        <?php if (session()->getFlashdata('success')): ?>
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end', // pojok kanan atas
                    icon: 'success',
                    title: "<?= session()->getFlashdata('success'); ?>",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            </script>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')): ?>
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end', // pojok kanan atas
                    icon: 'error',
                    title: "<?= session()->getFlashdata('error'); ?>",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            </script>
        <?php endif; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/scripts.js') ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/datatables-simple-demo.js') ?>"></script>
    </body>
</html>
