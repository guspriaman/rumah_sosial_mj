
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-sm-6">
                    <h1 class="m-0">MENU UBAH DATA PELANGGAN</h1>
                </div>
                <div class="col-sm-6 mb-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('pelanggan')?>">Home</a></li>
                        <li class="breadcrumb-item active">pelanggan</li>
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
                    <?php foreach ($pelanggan as $p) { ?>
                        <form action="<?= base_url('pelanggan/ubahPelanggan'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $p['id_pelanggan']; ?>">
                                <input type="text" class="form-control form-control-user" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" value="<?= $p['nama_pelanggan']; ?>">
                            </div>
                           
                            <div class="form-group">
                                <select name="id_lokasih" class="form-control form-control-user">
                                    <!-- <option value="<?= $l['id'] ?>" selected="selected"><?php $p['lokasih']; ?></option> -->
                                    <?php
                                    foreach ($lokasih as $l) { ?>
                                        <option value="<?= $l['id']; ?>"><?= $l['lokasih']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="no_tlp" name="no_tlp" placeholder="Masukkan No Tlp Pelanggan" value="<?= $p['no_tlp']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="tgl_gabung" name="tgl_gabung" placeholder="Masukkan Tgl Gabung Pelanggan" value="<?= $p['tgl_gabung']; ?>">
                            </div>
                
                            <div class="form-group">
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







