<?php

include "../../inc/koneksi.php";

$start = '';
$end = '';
if (isset($_GET['start'])) {
    $start = trim($_GET['start']);
}
if (isset($_GET['end'])) {
    $end = trim($_GET['end']);
}

$query = "SELECT p.id_petugas_bbnkb, p.kode_petugas, p.nama_petugas, p.id_pelayanan, p.tahun_kerja, p.status_kerja, m.id_pindah, m.id_petugas_bbnkb, m.nopol, m.nama_stnk, m.alamat_lama, m.alamat_baru, m.tgl from 
tb_pindah_bjm_Ii m inner join tb_petugas_bbnkb p on p.id_petugas_bbnkb=m.id_petugas_bbnkb";

if ($start != '' | $end != '') {
    $query .= " WHERE tgl between '$start' AND '$end'";
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
    <title>Laporan Data Pindah BJM II Ke BJM I</title>
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

    <h3 style="text-align:center">LAPORAN DATA PINDAH BJM II KE BJM I</h3>

    <!-- <table class="table" border="1" style="width: 600px"> -->
    <table class="table-data" cellspacing="0" align="center">
        <tr style="text-align:center">
            <th>NO</th>
            <th>KODE PETUGAS</th>
            <th>NOMOR POLISI</th>
            <th>NAMA PEMILIK STNK</th>
            <th>ALAMAT LAMA</th>
            <th>ALAMAT BARU</th>
            <th>TAGGAL PENGURUSAN</th>
        </tr>

        <?php

        $no = 1;
        while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
        ?>

            <tr style="text-align:center">
                <td><?= $no++; ?></td>
                <td><?= $data['kode_petugas'] ?></td>
                <td><?= $data['nopol'] ?></td>
                <td><?= $data['nama_stnk'] ?></td>
                <td><?= $data['alamat_baru'] ?></td>
                <td><?= $data['alamat_baru'] ?></td>
                <td><?= $data['tgl'] ?></td>
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