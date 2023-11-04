<?php
include "../config/koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM penyewaan");

function handlingTimeLaporan($pilihan, $tanggal)
{
  $split_to_array = preg_split("/-/", $tanggal);

  if ($pilihan == 'bulanan') {
    return $split_to_array[1] == date("m");
  } else if ($pilihan == 'tahunan') {
    return $split_to_array[0] == date("Y");
  } else {
    return false;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../public/dist/css/adminlte.min.css">
  <script src="../../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-5">
  <?php foreach ($sql as $key => $data) { ?>
    <div class="mb-5">
      <h3>Data Nomor <b><?= $data['id_penyewaan'] ?></b></h3>
      <table class="table table-bordered">
        <tbody align="center">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Judul Acara</th>
            <th scope="col">Nomor Gedung</th>
            <th scope="col">Penanggung Jawab</th>
          </tr>
          <tr>
            <td class="text-truncate" style="min-width: 12rem;"><?= $data['id_penyewaan'] ?></td>
            <td style="min-width: 27rem;"><?= $data['judul_acara'] ?></td>
            <td style="min-width: 12rem;"><?= $data['nomor_gedung'] ?></td>
            <td class="text-truncate" style="min-width: 27rem;"><?= $data['penanggung_jawab'] ?></td>
          </tr>
          <tr>
            <th scope="col">Nomor Telepon</th>
            <th scope="col">Email</th>
            <th scope="col">Tanggal Mulai</th>
            <th scope="col">Instansi/Organisasi</th>
          </tr>
          <tr>
            <td><?= $data['no_telp'] ?></td>
            <td class="text-truncate"><?= $data['email'] ?></td>
            <td><?= $data['tanggal_mulai'] ?></td>
            <td><?= $data['instansi'] ?></td>
          </tr>
          <tr>
            <th scope="col">Jumlah Orang</th>
            <th scope="col">Surat Pengantar</th>
            <th scope="col">Tanggal Akhir</th>
            <th scope="col">Status</th>
          </tr>
          <tr>
            <td><?= $data['jumlah_orang'] ?></td>
            <td class="text-truncate"><?= $data['surat_pengantar'] ?></td>
            <td><?= $data['tanggal_akhir'] ?></td>
            <td><?= $data['status'] ?></td>
          </tr>
          <tr>
            <th scope="col" colspan="4">Keperluan</th>
          </tr>
          <tr>
            <td class="" colspan="4"><?= $data['keperluan'] ?></td>
          </tr>
      </table>
    </div>
  <?php } ?>
</body>

</html>