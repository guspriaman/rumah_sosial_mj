
<?php $this->load->view('template/navbar') ?>
<?php $this->load->view('template/sidebar') ?>
<?php $this->load->view('user/menu_user') ?>


<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?php echo $page_title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $page_title ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>



  <!-- Begin Page Content -->
<div class="container-fluid">

<div class="row">
    <div class="col-lg-6 justify-content-x">
        <?= $this->session->flashdata('pesan'); ?>
    </div>
</div>
<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= base_url('assets/dist/img/profil/') . $user['image']; ?>" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $user['nama']; ?></h5>
                <p class="card-text"><?= $user['email']; ?></p>
                <p class="card-text"><small class="text-muted">Jadi member sejak: <br><b><?= date('d F Y', $user['tanggal_input']); ?></b></small></p>
            </div>
            <div class="btn btn-info ml-3 my-3">
                <a href="<?= base_url('profil/ubahprofil'); ?>" class="text text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
  



</div>

<?php $this->load->view('template/footer') ?>

</html>
