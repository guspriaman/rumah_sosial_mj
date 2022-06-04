
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Menu Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
                    <li class="breadcrumb-item active">menu management</li>
                </ol>
            </div>
            <div class="col-sm mt-4">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <?php if(validation_errors()){?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors();?>
                            </div>
                        <?php }?>
                        <?= $this->session->flashdata('pesan'); ?>
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#menuBaruModal"><i class="fas fa-file-alt"></i> Menu Baru</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">menu</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                                <?php
                                    $a = 1;
                                    foreach ($menu as $b) { ?>
                                <tr>
                                    <th scope="row"><?= $a++; ?></th>
                                    <td><?= $b['menu']; ?></td>
                                    <td>
                                        <a href="<?= base_url('menu/ubahMenu/').$b['id'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                        <a href="<?= base_url('menu/hapusMenu/').$b['id'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul.' '.$b['menu'];?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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




< <div class="modal fade" id="menuBaruModal" tabindex="-1" role="dialog" aria-labelledby="menuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuBaruModalLabel">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="menu" name="menu" placeholder="Masukkan Judul Buku">
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