
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Laporan Penjemputan Minyak Jelantah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('loporan_penjemputan')?>">Home</a></li>
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
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 mt-4">
                    <div class="btn-toolbar text-right" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2 mb-3" role="group" aria-label="First group">
                            <a href="<?= base_url('laporan/cetak_laporan_penjemputan'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>   
                        </div>
                        <div class="btn-group mr-2 mb-3" role="group" aria-label="Second group">
                            <a href="<?= base_url('laporan/laporan_penjemputan_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
                            
                        </div>
                        <div class="btn-group mb-3 " role="group" aria-label="Third group">
                            <a href="<?= base_url('laporan/export_excel'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
                        </div>
                    </div>
                </div>
                

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Admin Gudang</th>
                            <th scope="col">Nama PIC</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Tgl Penjemputan</th>
                            <th scope="col">lokasih</th>
                            <th scope="col">Jumlah (KG)</th>
                            <th scope="col">Ket</th>
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
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>