<div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>
    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                    <span class="badge badge-warning navbar-badge"></span>
                    <span class="mr-2 d-none d-lg-inline text-gray-600-small"><?= $user['nama']; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Data User</span>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('user')?>" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> My profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('auth/logout')?>" class="dropdown-item">
                        <i class="fas fa-arrow-right mr-2"></i> Logout

                    </a>
            </div>
        </li>

    </ul>


</nav>
