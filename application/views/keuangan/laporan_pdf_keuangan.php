

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <style type="text/css">
        .table-data{
        width: 100%;
        border-collapse: collapse;
        }
        .table-data tr th,
        .table-data tr td{
        border:1px solid black;
        font-size: 11pt;
        font-family:Verdana;
        padding: 10px 10px 10px 10px;
        }
        .table-data th{
            background-color: gray;
        }
        h3{
        font-family:Verdana;
        }
        </style>
        <h3><center>LAPORAN DATA PEMBAYARAN MINYAK JELANTAH</center></h3>
        <br/>
        <table class="table-data">    
                <!-- <table class="table table-hover"> -->
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Admin Keuangan</th>
                    <th scope="col">Nama PIC</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Tgl Penjemputan</th>
                    <th scope="col">Jumlah MJ(KG)</th>
                    <th scope="col">Pembayaran(Rp)</th>
                    <th scope="col">Ket</th>
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
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <script type="text/javascript">
    window.print();
    </script>
    </body>
</html>
