<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Menu Data Lokasi Pelanggan/Minyak Jelantah</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Lokasi</li>
                    </ol>
                </div>

                <div class="col-sm-6 mt-4">
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <?php if(validation_errors()){?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors();?>
                                </div>
                                <?php }?>
                            <?= $this->session->flashdata('pesan'); ?>
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#lokasihBaruModal"><i class="fas fa-file-alt"></i> Lokasi Baru</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card-header">
                        <div class="card-body table p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                                <?php
                                    $a = 1;
                                    foreach ($lokasih as $l) { ?>
                                    <tr>
                                    <th scope="row"><?= $a++; ?></th>
                                    <td><?= $l['lokasih']; ?></td>
                                    <td>
                                        <a href="<?= base_url('lokasih/ubahLokasih/').$l['id'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                        <a href="<?= base_url('lokasih/hapusLokasih/').$l['id'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul.' '.$l['id'];?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="lokasihBaruModal" tabindex="-1" role="dialog" aria-labelledby="lokasihBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lokasihBaruModalLabel">Tambah Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('lokasih'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="lokasih" name="lokasih" placeholder="Masukkan Lokasi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>