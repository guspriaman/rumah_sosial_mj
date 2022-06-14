

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
        <h3><center>LAPORAN DATA PENJEMPUTAN</center></h3>
        <br/>
        <table class="table-data">    
            <!-- <table class="table table-hover"> -->
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
    <script type="text/javascript">
    window.print();
    </script>
    </body>
</html>
