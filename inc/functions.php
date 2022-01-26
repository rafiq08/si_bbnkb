<?php

function tanggal_indo($tanggal)
{
  $hari = date('D', strtotime($tanggal));
  $bulan = date('F', strtotime($tanggal));
  $hariIndo = array(
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu',
    'Sun' => 'Minggu',
  );
  $bulanIndo = array(
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Desember'
  );
  return $hariIndo[$hari] . ' ' . date('d ') . $bulanIndo[$bulan] . date(' Y');
}
