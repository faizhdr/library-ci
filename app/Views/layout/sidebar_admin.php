<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link <?= is_active('dashboard_admin') ?>" href="/dashboard_admin">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link <?= is_active('buku') ?>" href="/buku">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                Data Buku
            </a>
            <a class="nav-link <?= is_active('kategori') ?>" href="/kategori">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i></div>
                Kategori
            </a>
            <a class="nav-link <?= is_active('pinjam') ?>" href="/pinjam">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-bookmark"></i></div>
                Data Pinjam
            </a>
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link <?= is_active('user') ?>" href="/user">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                user
            </a>
        </div>
    </div>
</nav>