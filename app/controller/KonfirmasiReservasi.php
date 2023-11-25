<?php
require "./KodeCaptcha.php";
require "./CekTanggalPenyewaan.php";

//cek tanggal apakah sudah terisi
if (CekTanggal($_POST['tanggal_mulai'], $_POST['tanggal_akhir'])) {
  echo '<script>
    alert("Tanggal penyewaan sudah terisi. Mohon ubah tanggal penyewaan");
    window.location.href="/reservasi/?page=formulir_reservasi&gedung=' . $_POST['gedung'] . '";</script>';
} else {

  $file = $_FILES['surat_pengantar'];
  $file_name = $file['name'];
  $unique_file_name = uniqid() . '_' . strtolower($file['name']);
  $file_tmp = $file['tmp_name'];

  move_uploaded_file($file_tmp, "../../public/temp/" . $unique_file_name);

  $_SESSION['data-konfirmasi'] = $_POST;
  $_SESSION['surat_pengantar'] = ['name' => $file_name, 'unique_name' => $unique_file_name];

  createCode();

  header('location: /reservasi/?page=konfirmasi_reservasi&gedung=' . $_POST['gedung'] . '&konfirmasi=menunggu');
}
