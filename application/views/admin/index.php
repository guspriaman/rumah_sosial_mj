
<?php $this->load->view('template/navbar') ?>
<?php $this->load->view('template/sidebar') ?>




<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>


<section class="content">
<div class="container-fluid mb-4">

  <h2 class="text-center">SELAMAT DATANG DI APLIKASI RUMAH SOSIAL MINYAK JELANTAH</h2>
</div>


  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <!-- <h3>5</h3> -->
          <p>DATA LOKASIH MJ</p>
        </div>
        <div class="icon">
          <i class="fas fa-globe"></i>
        </div>
        <a href="<?= base_url('lokasih')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <!-- <h3>10</h3> -->
          <p>DATA PERMINTAAN PENJEMPUTAN MJ</p>
        </div>
        <div class="icon">
          <i class="fas fa-book"></i>
        </div>
        <a href="<?= base_url('permintaan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <!-- <h3>10</h3> -->
          <p>DATA PENJEMPUTAN MJ</p>
        </div>
        <div class="icon">
          <i class="fas fa-truck"></i>
        </div>
        <a href="<?= base_url('penjemputan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <!-- <h3>10</h3> -->
          <p>DATA PEMBAYARAN MJ</p>
        </div>
        <div class="icon">
          <i class="fas fa-solid fa-file-invoice-dollar"></i>
        </div>
        <a href="<?= base_url('keuangan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>





    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
        <!-- <h3>10</h3> -->
        <p>LAPORAN PENJEMPUTAN</p>
        </div>
        <div class="icon">
        <i class="fas fa-truck"></i>
        </div>
      <a href="<?= base_url('laporan/laporan_penjemputan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
        <!-- <h3>10</h3> -->
        <p>LAPORAN KEUANGAN</p>
        </div>
        <div class="icon">
        <i class="fas fa-solid fa-file-invoice-dollar"></i>
        </div>
      <a href="<?= base_url('laporan/laporan_keuangan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
        <!-- <h3>10</h3> -->
        <p>LAPORAN DATA PELANGGAN</p>
        </div>
        <div class="icon">
        <i class="fas fa-users"></i>
        </div>
      <a href="<?= base_url('laporan/laporan_pelanggan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
</div>

  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <!-- <h3>4</h3> -->
          <p>DATA USER</p>
        </div>
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>




    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
        <!-- <h3>15</h3> -->
        <p>DATA PELANGGAN</p>
        </div>
        <div class="icon">
        <i class="fas fa-users"></i>
        </div>
      <a href="<?= base_url('laporan/laporan_user')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

</div>


</section>

<?php $this->load->view('template/footer') ?>
</html>


