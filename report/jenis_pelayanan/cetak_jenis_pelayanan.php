<?php

include "../../inc/koneksi.php";

?>

<style>
    .kecil {
        line-height: 10%;
    }

    .table-data {
        border-collapse: collapse;
    }

    .table-data td,
    .table-data th {
        border: 1px solid black;
        padding: 5px 10px 5px 10px;
    }
</style>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Jenis Pelayanan</title>
    <link rel="icon" href="../gambar/logo.png">
</head>

<body>

    <div style="display:flex; justify-content:center;">
        <table cellpadding="10" cellspacing="0">
            <tr>
                <th><img src="../gambar/logo.png" width="120" height="160"></th>
                <th></th> <br>
                <th style="text-align:center">
                    <p>PEMERINTAH PROVINSI KALIMANTAN SELATAN</p>
                    <p>BADAN KEUANGAN DAERAH</p>
                    <p>UNIT PELAYANAN PENDAPATAN DAERAH</p>
                    <p>(UPPD) BANJARMASIN II</p>
                    <h5>J1. Brig. Jend. H. Hasan Basri No. 07 Banjarmasin Kode Pos 70123Telepon : (0511) 6741100 </h5>
                        <h5>Email: uppdbanjarmasindua@gmail.com</h5>
                </th>
            </tr>
        </table>
    </div>

    <hr size="1" style="border-color: black;">

    <h3 style="text-align:center">LAPORAN DATA JENIS PELAYANAN</h3>



    <!-- <table class="table" border="1" style="width: 600px"> -->
    <table class="table-data" cellspacing="0" align="center">
        <tr>
            <th class="text-center">NO</th>
            <th class="text-center">BIDANG PELAYANAN</th>
            <th class="text-center">WAKTU PENYELESAIAN</th>
            <th class="text-center">JAM PELAYANAN</th>            
        </tr>

        <?php
        $sql_tampil = "SELECT * FROM tb_pelayanan";

        $query_tampil = mysqli_query($koneksi, $sql_tampil);
        $no = 1;
        while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
        ?>
            <tr>
                <td style="text-align:center"><?= $no++; ?></td>
                <td style="text-align:center"><?= $data['bidang_pelayanan'] ?></td>
                <td style="text-align:center"><?= $data['waktu_penyelesaian'] ?></td>
                <td style="text-align:center"><?= $data['jam_pelayanan'] ?></td>                
            </tr>
        <?php
        }
        ?>
    </table>

    <script>
        // window.print();
    </script>

</body>

</html>