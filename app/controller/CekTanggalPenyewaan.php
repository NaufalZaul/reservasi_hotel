<?php
include '../config/koneksi.php';

function CekTanggal($mulai, $akhir)
{
  global $conn;
  $query = mysqli_query($conn, "SELECT tanggal_mulai, tanggal_akhir FROM penyewaan");
  $tanggal_mulai = new DateTime($mulai);
  $tanggal_akhir = new DateTime($akhir);

  foreach ($query as $data) {
    $dt_tanggal_mulai = new DateTime($data['tanggal_mulai']);
    $dt_tanggal_akhir = new DateTime($data['tanggal_akhir']);

    if ($tanggal_mulai >= $dt_tanggal_mulai && $tanggal_mulai <= $dt_tanggal_akhir) {
      return true;
    } else if ($tanggal_akhir >= $dt_tanggal_mulai && $tanggal_akhir <= $dt_tanggal_akhir) {
      return true;
    } else if ($tanggal_mulai >= $dt_tanggal_mulai && $tanggal_akhir <= $dt_tanggal_akhir) {
      return true;
    } else {
      return false;
    }
  }
}