
<?php $this->load->view('template/navbar') ?>
<?php $this->load->view('template/sidebar') ?>

<section class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?php echo $page_title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard')  ?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $page_title ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="box">
        <h5 class="box-title">Data Pelanggan</h5>
        <div class="float-sm-right">
            <a href="#" class="btn btn-primary btn-flat">
                <i class="fa fa-user-plus"></i>create
            </a>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>No Tlp</th>
                        <th>Jenis K</th>
                        <th>Alamat</th>
                        <Th>Aksi</Th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key =>$data) { ?>
                        <tr>
                            <td><?=$no++ ?></td>
                            <td><?=$data->nama ?></td>
                            <td><?=$data->tlp?></td>
                            <td><?=$data->jenis_kelamin == 'L' ? "Laki-Laki" : "Perempuan" ?></td>
                            <td><?=$data->alamat?></td>
                            <td class="text-center" width="160px">
                                <!-- <a href="<?= site_url('pelanggan/edit/' . $data->id_pelanggan) ?>" class="btn btn-primary btn-xs"> -->
                                <a href="#" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <!-- <input type="hidden" name="id_pelanggan" value="<?= $data->id_pelanggan ?>"> -->
                                <input type="hidden" name="id_pelanggan" value="#">
                                <!-- <a href="<?= site_url('pelanggan/del/' . $data->pelanggan_id) ?>" onclick="return confirm('Apakah anda yakin hapus data?')" class=" btn btn-danger btn-xs"> -->
                                <a href="#" onclick="return confirm('Apakah anda yakin hapus data?')" class=" btn btn-danger btn-xs">
                                    <i class="fa fa-user-plus"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<?php $this->load->view('template/footer') ?>

</html>
