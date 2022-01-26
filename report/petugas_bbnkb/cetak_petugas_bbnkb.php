<?php

include "../../inc/koneksi.php";
include "../../inc/functions.php";

$start = '';
$end = '';
if (isset($_GET['start'])) {
    $start = trim($_GET['start']);
}
if (isset($_GET['end'])) {
    $end = trim($_GET['end']);
}

$query = "SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja, m.id_pemutihan, m.id_petugas_bbnkb, m.nopol, m.nama_stnk, m.tanggal from 
tb_pemutihan m inner join tb_petugas_bbnkb p on  p.id_petugas_bbnkb=m.id_petugas_bbnkb";

if ($start != '' | $end != '') {
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
                    <div>PEMERINTAH PROVINSI KALIMANTAN SELATAN</div>
                    <div>BADAN KEUANGAN DAERAH</div>
                    <div>UNIT PELAYANAN PENDAPATAN DAERAH</div>
                    <div>(UPPD) BANJARMASIN II</div>
                    <div style="margin-top: 15px; font-weight: 300;">J1. Brig. Jend. H. Hasan Basri No. 07 Banjarmasin Kode Pos 70123Telepon : (0511) 6741100 </div>
                    <div style="font-weight: 300;">Email: uppdbanjarmasindua@gmail.com</div>
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

    <div style="max-width: 1000px; margin:0 auto;">
        <div style="display: flex; justify-content: end; margin-top: 3rem;">
            <div style="width: 300px;">
                <div style="text-align: center;">
                    Banjarmasin , <?= tanggal_indo(date('D d F Y')) ?>
                    <br>
                    KASI PELAYANAN PKB & BBNKB
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <span><u>H.RUDY INDRAWAB BAKTIE, S.SOS, MM</u></span>
                    <br>
                    NIP. 19730808 200801 1 022
                </div>
            </div>
        </div>
    </div>

    <script>
        // window.print();
    </script>

</body>

</html>