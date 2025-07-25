<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link <?= is_active('list_buku') ?>" href="/list_buku">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                List Buku
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link <?= is_active('list_pinjam_per_user') ?>" href="/list_pinjam_per_user">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-bookmark"></i></div>
                Data Pinjam
            </a>
        </div>
    </div>
</nav>