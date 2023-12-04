<?php
include '../config/koneksi.php';
include './KodeCaptcha.php';


if (confirmCode()) {
  $id_penyewaan = uniqid();
  $keperluan = $_POST["keperluan"];
  $instansi = $_POST["instansi"];
  $penanggung_jawab = $_POST["penanggung_jawab"];
  $no_telp = $_POST["no_telp"];
  $email = $_POST["email"];
  $tanggal_mulai = $_POST["tanggal_mulai"];
  $tanggal_akhir = $_POST["tanggal_akhir"];
  $jumlah_peserta = $_POST["jumlah_peserta"];
  $deskripsi = $_POST["deskripsi"];
  $nama_gedung = $_POST['gedung'];
  $surat_pengantar = $_SESSION['surat_pengantar']['unique_name'];

  // filePDF();
  rename('../../public/temp/' . $surat_pengantar, '../../admin/public/documents/' . $surat_pengantar);


  $sql = "INSERT INTO `penyewaan` (`id_penyewaan`, `keperluan`, `nama_gedung`, `instansi`, `penanggung_jawab`, `no_telp`, `email`, `tanggal_mulai`, `tanggal_akhir`, `jumlah_peserta`, `surat_pengantar`, `deskripsi`,`status`) VALUES ('$id_penyewaan','$keperluan','$nama_gedung', '$instansi','$penanggung_jawab','$no_telp','$email','$tanggal_mulai','$tanggal_akhir','$jumlah_peserta', '$surat_pengantar','$deskripsi','Menunggu')";

  // var_dump($sql);
  if (mysqli_query($conn, $sql)) {
    session_destroy();
    header('location: /reservasi/?page=formulir_reservasi&gedung=' . $nama_gedung . '&status=sukses');
  } else {
    header('location: /reservasi/?page=formulir_reservasi&gedung=' . $nama_gedung . '&status=gagal');
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
