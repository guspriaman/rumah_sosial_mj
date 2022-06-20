
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-sm-6 ">
                    <h1 class="m-3 text-center">MENU UBAH DATA PENJEMPUTAN MINYAK JELANTAH</h1>
                </div>
                <div class="col-sm-6 mb-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('penjemputan')?>">Home</a></li>
                        <li class="breadcrumb-item active">Penjemputan </li>
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
                    <?php foreach ($penjemputan as $g) { ?>
                        <form action="<?= base_url('penjemputan/ubahPenjemputan'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id_penjemputan" id="id_penjemputan" value="<?= $g['id_penjemputan']; ?>">
                                <input type="text" class="form-control form-control-user" id="nama_admin_g" name="nama_admin_g" placeholder="Masukkan Nama Admin Gudang" value="<?= $g['nama_admin_g']; ?>">
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
                                <select class="form-control form-control-user" id="lokasih" name="lokasih" placeholder="Masukan Lokasih Minyak jelantah" value="<?= $l['lokasih']; ?>">
                                    <?php foreach ($lokasih as $l) { ?>
                                        <option value="<?= $l['lokasih'];?>"><?= $l['lokasih'];?></option>
                                        
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="jumlah" name="jumlah" placeholder="Masukkan jumlah Permintaan" value="<?= $g['jumlah']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="tgl_penjemputan" name="tgl_penjemputan" placeholder="Masukkan Tgl Penjemputan" value="<?= $g['tgl_penjemputan']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <select class="form-control form-control-user" id="status" name="status" placeholder="Masukan Lokasih Minyak jelantah" value="<?= $g['status']; ?>">
                                        <option value="Sudah Dijemput">Sudah Dijemput</option>
                                        <option value="Belum Dijemput">Belum Dijemput</option>
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







