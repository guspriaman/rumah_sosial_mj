
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-sm-6 ">
                    <h1 class="m-3">MENU UBAH DATA PERMINTAAN PENJEMPUTAN</h1>
                </div>
                <div class="col-sm-6 mb-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('permintaan')?>">Home</a></li>
                        <li class="breadcrumb-item active">Permintaan </li>
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
                    <?php foreach ($permintaan as $j) { ?>
                        <form action="<?= base_url('permintaan/ubahPermintaan'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id_permintaan" id="id_permintaan" value="<?php echo $j['id_permintaan']; ?>">
                                <input type="text" class="form-control form-control-user" id="nama_pic" name="nama_pic" placeholder="Masukkan Nama PIC" value="<?= $j['nama_pic']; ?>">
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
                                <select class="form-control form-control-user" id="lokasih" name="lokasih" placeholder="Masukan Lokasi Minyak jelantah" value="<?= $l['lokasih']; ?>">
                                    <?php foreach ($lokasih as $l) { ?>
                                        <option value="<?= $l['lokasih'];?>"><?= $l['lokasih'];?></option>
                                        
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="jumlah" name="jumlah" placeholder="Masukkan jumlah Permintaan" value="<?= $j['jumlah']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="tgl_permintaan" name="tgl_permintaan" placeholder="Masukkan Tgl Permintaan" value="<?= $j['tgl_permintaan']; ?>">
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







