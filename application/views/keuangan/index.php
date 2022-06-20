
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">MENU DATA PEMBAYARAN</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('keuangan')?>">Home</a></li>
                        <li class="breadcrumb-item active">menu Pembayaran</li>
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
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#keuanganBaruModal"><i class="fas fa-file-alt"></i>Tambah Data Pembayaran MJ</a>
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
                                        <th scope="col">Nama Admin keuangan</th>
                                        <th scope="col">Nama PIC</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Tgl Pembayaran</th>
                                        <th scope="col">Jumlah MJ</th>
                                        <th scope="col">Pembayaran MJ</th>
                                        <th scope="col">Status Pembayaran</th>
                                        <th scope="col">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                $a = 1;
                                foreach ($keuangan as $k) { ?>
                                <tr>
                                    <th scope="row"><?= $a++; ?></th>
                                        <td><?= $k['nama_admin_k']; ?></td>
                                        <td><?= $k['nama_pic']; ?></td>
                                        <td><?= $k['nama_pelanggan']; ?></td>
                                        <td><?= $k['tgl_pembayaran']; ?></td>
                                        <td><?= $k['jumlah']; ?></td>
                                        <td><?= $k['bayar']; ?></td>
                                        <td><?= $k['status']; ?></td>
                                        <td>
                                            <a href="<?= base_url('keuangan/ubahkeuangan/').$k['id_keuangan'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                            <a href="<?= base_url('keuangan/hapusKeuangan/').$k['id_keuangan'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul.' '.$k['nama_admin_k'];?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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













<div class="modal fade" id="keuanganBaruModal" tabindex="-1" role="dialog" aria-labelledby="keuanganBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="keuanganBaruModalLabel">Tambah Data Penjemputan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('keuangan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_admin_k" name="nama_admin_k" placeholder="Masukkan Nama Admin keuangan">
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
                            <option value="">Pilih Nama_pelanggan</option>
                            <?php
                            foreach ($pelanggan as $p) { ?>
                                <option value="<?= $p['nama_pelanggan'];?>"><?= $p['nama_pelanggan'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control form-control-user" id="tgl_pembayaran" name="tgl_pembayaran" placeholder="Masukkan Tanggal Pembayaran">
                    </div>
                
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah Minyak Jelantah">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="bayar" name="bayar" placeholder="Masukkan jumlah Pembayaran">
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user" id="status" name="status">
                            <option value="">-Pilih Status Pembayaran-</option>
                            <option value="Sudah Dibayar">Sudah Dibayar</option>
                            <option value="Belum Dibayar">Belum Dibayar</option>
                        </select>
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
















