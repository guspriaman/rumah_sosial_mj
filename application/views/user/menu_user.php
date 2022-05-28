



<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Rumah Sosial MJ</span>
    </a>

<div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="assets/dist/img/profil/1.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?= $user['nama']?></a>
        </div>
    </div>

<div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    
        <li class="nav-header">HALAMAN USER</li>
            <li class="nav-item">
                <a href="<?= base_url('profil')?>" class="nav-link">
                    <i class="fas fa-fw fa-book  nav-icon"></i>
                    <p>Profil User/PIC</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-fw  fa-book nav-icon"></i>
                    <p>Imput Data MJ</p>
                </a>
            </li>
        

            <li class="nav-header">LOKAL</li>
            <li class="nav-item">
                <a href="<?= base_url('auth/logout')?>" class="nav-link">
                    <i class="fas fa-arrow-right fa-fw nav-icon"></i>
                    <p>Logout</p>
                </a>
            </li>
</ul>
</nav>

</div>

</aside>