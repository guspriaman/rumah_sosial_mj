
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Minyak Jelantah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Minyak Jelantah</li>
                    </ol>
                </div>
                <div class="col-sm-12 mt-4">
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if(validation_errors()){?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors();?>
                                </div>
                            <?php }?>
                            <?= $this->session->flashdata('pesan'); ?>
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#mjBaruModal"><i class="fas fa-file-alt"></i> Tambah Data permintaan penjemputan MJ</a>
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
                                        <th scope="col">Nama PIC</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Lokasih Minyak Jelantah</th>
                                        <th scope="col">Jumalah Minyak Jelantah</th>
                                        <th scope="col">Tgl Permintaan Penjemputan</th>
                                        <th scope="col">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                $a = 1;
                                foreach ($mj as $j) { ?>
                                <tr>
                                    <th scope="row"><?= $a++; ?></th>
                                        <td><?= $j['nama_pic']; ?></td>
                                        <td><?= $j['nama_pelanggan']; ?></td>
                                        <td><?= $j['lokasih']; ?></td>
                                        <td><?= $j['jumlah']; ?></td>
                                        <td><?= $j['tgl_minta_jemput']; ?></td>
                                        <td>
                                            <a href="<?= base_url('mj/ubahMj/').$j['id_mj'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                            <a href="<?= base_url('mj/hapusMj/').$j['id_mj'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul.' '.$j['nama_pic'];?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="mjBaruModal" tabindex="-1" role="dialog" aria-labelledby="mjBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mjBaruModalLabel">Tambah Data Minyak Jelantah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('mj'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_pic" name="nama_pic" placeholder="Masukkan Nama PIC">
                    </div>

                    <div class="form-group">
                        <select name="nama_pelanggan" class="form-control form-control-user">
                            <option value="">Pilih Nama_pelanggan</option>
                            <?php
                            foreach ($pelanggan as $p) { ?>
                                <option value="<?= $p['nama_pelanggan'];?>"><?= $p['nama_pelanggan'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_lokasih" class="form-control form-control-user">
                            <option value="">Pilih Lokasih</option>
                            <?php
                            foreach ($lokasih as $l) { ?>
                                <option value="<?= $l['lokasih'];?>"><?= $l['lokasih'];?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah Minyak Jelantah">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control form-control-user" id="tgl_minta_jemput" name="tgl_minta_jemput" placeholder="Masukkaan Tanggal Penjemputan">
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