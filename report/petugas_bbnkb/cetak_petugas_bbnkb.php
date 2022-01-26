<?php

include "../../inc/koneksi.php";

$start = '';
$end = '';
if(isset($_GET['start'])) {
    $start = trim($_GET['start']);
}
if(isset($_GET['end'])) {
    $end = trim($_GET['end']);
}

$query = "SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja, m.id_pemutihan, m.id_petugas_bbnkb, m.nopol, m.nama_stnk, m.tanggal from 
tb_pemutihan m inner join tb_petugas_bbnkb p on  p.id_petugas_bbnkb=m.id_petugas_bbnkb";

if($start != '' | $end != '') {
    $query .= " WHERE tanggal between '$start' AND '$end'";
}

$query_tampil = mysqli_query($koneksi, $query);

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
    <title>Laporan Data Petugas BBNKB</title>
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

    <h3 style="text-align:center">LAPORAN DATA PETUGAS PELAYANAN BBNKB</h3>



    <!-- <table class="table" border="1" style="width: 600px"> -->
    <table class="table-data" cellspacing="0" align="center">
        <tr>
            <th class="text-center">NO</th>
            <th class="text-center">KODE PETUGAS</th>
            <th class="text-center">NAMA PETUGAS</th>
            <th class="text-center">BIDANG PELAYANAN</th>
            <th class="text-center">TAHUN KERJA</th>
            <th class="text-center">STATUS KERJA</th>
        </tr>

        <?php
        $sql_tampil = "SELECT p.id_pelayanan, p.bidang_pelayanan, m.id_petugas_bbnkb, m.kode_petugas, m.nama_petugas, m.id_pelayanan, m.tahun_kerja, m.status_kerja from tb_petugas_bbnkb m inner join tb_pelayanan p on p.id_pelayanan=m.id_pelayanan";

        $query_tampil = mysqli_query($koneksi, $sql_tampil);
        $no = 1;
        while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
        ?>
            <tr>
                <td style="text-align:center"><?= $no++; ?></td>
                <td style="text-align:center"><?= $data['kode_petugas'] ?></td>
                <td style="text-align:center"><?= $data['nama_petugas'] ?></td>
                <td style="text-align:center"><?= $data['bidang_pelayanan'] ?></td>
                <td style="text-align:center"><?= $data['tahun_kerja'] ?></td>
                <td style="text-align:center"><?= $data['status_kerja'] ?></td>
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