
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data penjemputan Minyak Jelantah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('penjemputan')?>">Home</a></li>
                        <li class="breadcrumb-item active">menu Data Penjemputan</li>
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
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#penjemputanBaruModal"><i class="fas fa-file-alt"></i>Tambah Data Penjemputan</a>
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
                                        <th scope="col">Nama Admin Gudang</th>
                                        <th scope="col">Nama PIC</th>
                                        <th scope="col">Nama Pelangganaa</th>
                                        <th scope="col">Tgl Penjemputan</th>
                                        <th scope="col">Lokasih MJ</th>
                                        <th scope="col">Jumlah MJ</th>
                                        <th scope="col">Status Penjemputan</th>
                                        <th scope="col">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    
                                <?php
                                $a = 1;
                                foreach ($penjemputan as $g) { ?>
                                <tr>
                                    <th scope="row"><?= $a++; ?></th>
                                    <td><?= $g['nama_admin_g']; ?></td>
                                    <td><?= $g['nama_pic']; ?></td>
                                    <td><?= $g['nama_pelanggan']; ?></td>
                                    <td><?= $g['tgl_penjemputan']; ?></td>
                                    <td><?= $g['lokasih']; ?></td>
                                    <td><?= $g['jumlah']; ?></td>
                                    <td><?= $g['status']; ?></td>
                                    <td>
                                        <a href="<?= base_url('penjemputan/ubahPenjemputan/').$g['id_penjemputan'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                        <a href="<?= base_url('penjemputan/hapusPenjemputan/').$g['id_penjemputan'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul.' '.$g['nama_admin_g'];?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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




<div class="modal fade" id="penjemputanBaruModal" tabindex="-1" role="dialog" aria-labelledby="penjemputanBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="penjemputanBaruModalLabel">Tambah Data Penjemputan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('penjemputan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_admin_g" name="nama_admin_g" placeholder="Masukkan Nama Admin Gudang">
                    </div>

                    <div class="form-group">
                        <select name="nama_pic" class="form-control form-control-user">
                            <option value="">Pilih Nama PIC</option>
                            <?php
                            foreach ($permintaan as $j) { ?>
                                <option value="<?= $j['nama_pic'];?>"><?= $j['nama_pic'];?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="nama_pelanggan" class="form-control form-control-user">
                            <option value="">Pilih Nama pelanggan</option>
                            <?php
                            foreach ($pelanggan as $p) { ?>
                                <option value="<?= $p['nama_pelanggan'];?>"><?= $p['nama_pelanggan'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    
                    <div class="form-group">
                        <input type="date" class="form-control form-control-user" id="tgl_penjemputan" name="tgl_penjemputan" placeholder="Masukkan Tanggal Penjemputan">
                    </div>


                    <div class="form-group">
                        <select name="lokasih" class="form-control form-control-user">
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
                        <input type="text" class="form-control form-control-user" id="status" name="status" placeholder="Pilih Status Penjemputan">
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
















