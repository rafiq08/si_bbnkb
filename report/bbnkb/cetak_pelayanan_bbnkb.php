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

$query = "SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja, q.id_pelayanan, q.bidang_pelayanan, q.waktu_penyelesaian, q.jam_pelayanan, m.id_bbnkb, m.jenis_pelayanan, m.nopol_lama, m.nopol_baru, m.nama_lama, m.nama_baru, m.tgl_daftar from tb_bbnkb m inner join tb_petugas_bbnkb p on p.id_petugas_bbnkb=m.id_petugas_bbnkb
inner join tb_pelayanan q on q.id_pelayanan = m.jenis_pelayanan";

if ($start != '' | $end != '') {
    $query .= " WHERE tgl_daftar between '$start' AND '$end'";
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
    <title>Laporan Data Pelayanan BBNKB</title>
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

    <h3 style="text-align:center">LAPORAN DATA ADMINISTRASI PELAYANAN BBNKB</h3>

    <!-- <table class="table" border="1" style="width: 600px"> -->
    <table class="table-data" cellspacing="0" align="center">
        <tr style="text-align:center">
            <th>NO</th>
            <th>KODE PETUGAS</th>
            <th>JENIS PELAYANAN</th>
            <th>NOPOL LAMA</th>
            <th>NOPOL BARU</th>
            <th>NAMA LAMA</th>
            <th>NAMA BARU</th>
            <th>TANGGAL PENGURUSAN</th>
        </tr>

        <?php
        $no = 1;
        while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
        ?>

            <tr style="text-align:center">
                <td><?= $no++; ?></td>
                <td><?= $data['nama_petugas'] ?></td>
                <td><?= $data['bidang_pelayanan'] ?></td>
                <td><?= $data['nopol_lama'] ?></td>
                <td><?= $data['nopol_baru'] ?></td>
                <td><?= $data['nama_lama'] ?></td>
                <td><?= $data['nama_baru'] ?></td>
                <td><?= $data['tgl_daftar'] ?></td>
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
        window.print();
    </script>

</body>

</html>