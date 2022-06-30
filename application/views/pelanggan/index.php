

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">MENU DAFTAR PELANGGAN MINYAK JELANTAH</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('pelanggan')?>">Home</a></li>
                        <li class="breadcrumb-item active">Pelanggan</li>
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
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#pelangganBaruModal"><i class="fas fa-file-alt"></i> Pelanggan Baru</a>
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
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Lokasi Pelanggan</th>
                                        <th scope="col">No Tlp Pelanggan</th>
                                        <th scope="col">Tgl Gabung Pelanggan</th>
                                        <th scope="col">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                $a = 1;
                                foreach ($pelanggan as $p) { ?>
                                <tr>
                                    <th scope="row"><?= $a++; ?></th>
                                        <td><?= $p['nama_pelanggan']; ?></td>
                                        <td><?= $p['id_lokasih']; ?></td>
                                        <td><?= $p['no_tlp']; ?></td>
                                        <td><?= $p['tgl_gabung']; ?></td>
                                        <td>
                                            <a href="<?= base_url('pelanggan/ubahPelanggan/').$p['id_pelanggan'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                            <a href="<?= base_url('pelanggan/hapusPelanggan/').$p['id_pelanggan'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul.' '.$p['nama_pelanggan'];?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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















<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah buku baru-->
<div class="modal fade" id="pelangganBaruModal" tabindex="-1" role="dialog" aria-labelledby="pelangganBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pelangganBaruModalLabel">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pelanggan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan">
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="lokasih" name="lokasih" placeholder="Masukkan Lokasih Pelanggan">
                    </div> -->
                    <div class="form-group">
                        <select name="id_lokasih" class="form-control form-control-user">
                            <option value="">Pilih lokasi</option>
                            <?php
                            foreach ($lokasih as $l) { ?>
                                <option value="<?= $l['lokasih'];?>"><?= $l['lokasih'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="no_tlp" name="no_tlp" placeholder="Masukkan No Tlp Pelanggan">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control form-control-user" id="tgl_gabung" name="tgl_gabung" placeholder="Masukkan Tgl Gabung Pelanggan">
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
<!-- End of Modal Tambah Mneu -->













