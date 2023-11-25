<?php
include '../config/koneksi.php';
include './KodeCaptcha.php';


if (confirmCode()) {
  $id_penyewaan = uniqid();
  $judul_acara = $_POST["judul_acara"];
  $instansi = $_POST["instansi"];
  $penanggung_jawab = $_POST["penanggung_jawab"];
  $no_telp = $_POST["no_telp"];
  $email = $_POST["email"];
  $tanggal_mulai = $_POST["tanggal_mulai"];
  $tanggal_akhir = $_POST["tanggal_akhir"];
  $jumlah_orang = $_POST["jumlah_orang"];
  $keperluan = $_POST["keperluan"];
  $nomor_gedung = $_POST['gedung'];
  $surat_pengantar = $_SESSION['surat_pengantar']['unique_name'];

  // filePDF();
  rename('../../public/temp/' . $surat_pengantar, '../../admin/public/documents/' . $surat_pengantar);


  $sql = "INSERT INTO `penyewaan` (`id_penyewaan`, `judul_acara`, `nomor_gedung`, `instansi`, `penanggung_jawab`, `no_telp`, `email`, `tanggal_mulai`, `tanggal_akhir`, `jumlah_orang`, `surat_pengantar`, `keperluan`) VALUES ('$id_penyewaan','$judul_acara','$nomor_gedung', '$instansi','$penanggung_jawab','$no_telp','$email','$tanggal_mulai','$tanggal_akhir','$jumlah_orang', '$surat_pengantar','$keperluan')";

  if (mysqli_query($conn, $sql)) {
    session_destroy();
    var_dump('sukses');
    header('location: /reservasi/?page=formulir_reservasi&gedung=' . $nomor_gedung . '&status=sukses');
  } else {
    header('location: /reservasi/?page=formulir_reservasi&gedung=' . $nomor_gedung . '&status=gagal');
  }
} else {
  $get_data = '';
  foreach ($_POST as $key => $value) {
    if ($key == 'keperluan') {
      $get_data .= $key . '=' . $value;
      break;
    } else {
      $get_data .= $key . '=' . $value . '&';
    }
  }
  createCode();
  header('location: /reservasi/?page=konfirmasi_reservasi&' . $get_data . '&konfirmasi=salah');
}
