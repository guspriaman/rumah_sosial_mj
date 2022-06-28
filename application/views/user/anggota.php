<?php $this->load->view('template/navbar') ?>
<?php $this->load->view('template/sidebar') ?>

<section class="content">
<div class="container-fluid">



  <div class="content-wrapper">

    <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>

        <?php if (validation_errors()) { ?>
        <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
        </div>
        <?php } ?>
        <?= $this->session->flashdata('pesan'); ?>
                    
        <table class="table table-hover">
            <thead>
              <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col" nowrap>Member Sejak</th>
                    <th scope="col">Image</th>                       
                  </tr>
            </thead>
            <tbody>
              
            <?php
            $i = 1;
            foreach ($anggota as $a) { ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                    <td><?= $a['nama']; ?></td>
                    <td><?= $a['email']; ?></td>
                    <td><?= date('d F Y', $a['tanggal_input']); ?></td>
                    <td>
                      <picture>
                        <source srcset="" type="image/svg+xml">
                          <img src="<?= base_url('assets/dist/img/profil/') . $a['image']; ?>" class="img-fluid img-thumbnail" style="width:60px;height:80px;">
                        </picture>
                       </td>
                      <!--<td>
                        <a href="#" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="#" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $b['judul_buku']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                      </td>  -->
                  </tr>
                <?php } ?>
            </tbody>
        </table>



      </div>
    </div>
  </div>



</div>

</section>


<?php $this->load->view('template/footer') ?>
</html>


