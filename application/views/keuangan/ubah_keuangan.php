
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-sm-6 ">
                    <h1 class="m-3 text-center">Menu Data Permintaan Penjemputan Minyak Jelantah</h1>
                </div>
                <div class="col-sm-6 mb-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('keuangan')?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Penjemputan </li>
                    </ol>
                </div>

                <?= $this->session->flashdata('pesan'); ?>

                <div class="col-lg-6">
                    <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php } ?>
                    <?= $this->session->flashdata('pesan'); ?>
                    <?php foreach ($keuangan as $k) { ?>
                        <form action="<?= base_url('keuangan/ubahKeuangan'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id_keuangan" id="id_keuangan" value="<?= $k['id_keuangan']; ?>">
                                <input type="text" class="form-control form-control-user" id="nama_admin_k" name="nama_admin_k" placeholder="Masukkan Nama Admin Keuangan" value="<?= $k['nama_admin_k']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <select id="nama_pic"  name="nama_pic" class="form-control form-control-user" value="<?= $j['nama_pic']; ?>">
                                    <?php
                                    foreach ($permintaan as $j) { ?>
                                        <option value="<?= $j['nama_pic'];?>"><?= $j['nama_pic'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="nama_pelanggan"  name="nama_pelanggan" class="form-control form-control-user" value="<?= $p['nama_pelanggan']; ?>">
                                    <?php
                                    foreach ($pelanggan as $p) { ?>
                                        <option value="<?= $p['nama_pelanggan'];?>"><?= $p['nama_pelanggan'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="tgl_pembayaran" name="tgl_pembayaran" placeholder="Masukkan Tgl Pembayaran" value="<?= $k['tgl_pembayaran']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="jumlah" name="jumlah" placeholder="Masukkan jumlah Minyak Jelantah" value="<?= $k['jumlah']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="bayar" name="bayar" placeholder="Masukkan jumlah Pembayaran" value="<?= $k['bayar']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <select class="form-control form-control-user" id="status" name="status" placeholder="Masukan Pembayaran Minyak jelantah" value="<?= $k['status']; ?>">
                                        <option value="Sudah Dibayar">Sudah Dibayar</option>
                                        <option value="Belum Dibayar">Belum Dibayar</option>
                                </select>
                            </div>
                            <div class="form-group text-right">
                                <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                                <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                            </div>
                        </form>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>







