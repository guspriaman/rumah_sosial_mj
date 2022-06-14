<div class="preloader flex-column justify-content-center align-items-center">
<!-- <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
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


<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="#" class="brand-link text-center">
    <span class="brand-text font-weight-light">RUMAH SOSIAL MJ</span>
</a>

<div class="sidebar">

    <?php
    $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
                        FROM `user_menu` JOIN `user_access_menu`
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`. `menu_id` ASC
                    ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>




    <?php foreach ($menu as $m) : ?>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header text-white">
                    <?= $m['menu']; ?>
                </li>


                <?php
                $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                                    FROM `user_sub_menu` JOIN `user_menu`
                                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                WHERE `user_sub_menu`.`menu_id` = $menuId
                                AND `user_sub_menu`.`is_active` = 1
                                ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
                    <?php foreach ($subMenu as $sm) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url($sm['url']);?>" class="nav-link">
                            <i class="<?= $sm['icon'];?>"></i>
                            <span><?=$sm['title'];?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
            </ul>
        </nav>
        <hr class="divider-header">
        <?php endforeach; ?>


    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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