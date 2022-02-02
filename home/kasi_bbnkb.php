<div class="card card-success">
  <div class="card-header">
    <h3 class="text-center">Aplikasi Pendataan Administrasi Pajak Balik Nama Kendaraan Bermotor</h3>
    <h5 class="text-center">UPPD BANJARMASIN II</h5>
  </div>
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
  <!-- /.card-header -->
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" cellspacing="0">
        <thead>

          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>
              <img style="max-width:1200px; width:100%; height:auto;" src="assets/img/gambar1.jpg">
            </td>
            <td>
              <img style="max-width:100px; width:100%; height:auto;" src="report/gambar/logo.png">
              <h4>Visi</h4>
              <a>"Kalsel Mapan (Mandiri Dan Terdepan) Lebih Sejahtera, Berkeadilan, Rerdikari Dan Berdaya Saing".</a> <br><br>
              <h4>Misi</h4>
              <a>1. Mengembangkan Sumber Daya Manusia Yang Agamis, Shat, Cerdas Dan Terampil;</a> <br>
              <a>2. Mengembangkan Daya Saing Ekonomi Daerah Yang Berbasis Sumberdaya Lokal, Dengan Memperhatikan Kelestarian Lingkungan;</a> <br>
              <a>3. Mengembangkan Infrastruktur Wilayah Yang Mendukung Percepatan Pengembangan Ekonomi Dan Sosial Budaya;</a> <br>
              <a>4. Memantafkan Kondisi Sosial Budaya Daerah Yang Berbasiskan Kearifan Lokal</a> <br>
              <a>5. Mewujudkan Tata Kelola Pemerintah Yang Professional Dan Berorientasi Pada Pelayanan Publik.</a><br>
            </td>
          </tr>
        </tbody>
        </tfoot>
      </table> <br>
      <?php
      $tanggal = date('D d F Y');
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
      echo $hariIndo[$hari] . ', ' . date('d ') . $bulanIndo[$bulan] . date(' Y');
      ?>
    </div>
  </div>
  <!-- /.card-body -->