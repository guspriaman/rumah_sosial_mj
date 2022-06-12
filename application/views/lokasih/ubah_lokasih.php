
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-sm-6">
                    <h1 class="m-0">Menu Data Lokasih Pelanggan/Minyak Jelantah</h1>
                </div>
                <div class="col-sm-6 mb-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Lokasih</li>
                    </ol>
                </div>

                <?= $this->session->flashdata('pesan'); ?>
                <div class="col-lg-6 text-right">
                    <?php if (validation_errors()) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Nama Kategori tidak boleh Kosong</div>');
                    redirect('lokasih/ubahlokasih/' . $l['id']);
                    } ?>
                    <?php foreach ($lokasih as $l) { ?>
                        <form action="<?= base_url('lokasih/ubahLokasih'); ?>" method="post">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="<?php echo $l['id']; ?>">
                                <input type="text" class="form-control form-control-user" id="lokasih" name="lokasih" placeholder="Masukkan lokasih " value="<?= $l['lokasih']; ?>">
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


