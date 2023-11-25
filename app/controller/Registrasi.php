<?php
include '../config/koneksi.php';

// $id_akun = uniqid();
// $id_penyewa = rand();
$id_penyewa = uniqid();
$nama_lengkap = $_POST['nama'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$no_telp = $_POST['no_telp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$kota_asal = $_POST['kota_asal'];

$query = "INSERT INTO `penyewa` (`id_penyewa`, `nama_lengkap`, `username`, `email`, `password`, `alamat`, `kota_asal`, `no_telp`, `jenis_kelamin`) VALUES ('$id_penyewa','$nama_lengkap','$username', '$email','$password','$alamat', '$kota_asal','$no_telp','$jenis_kelamin')";

$sql = mysqli_query($conn, $query);

if ($sql) {

  echo "
    <script>alert('Data Berhasil Disimpan');
    window.location='/reservasi/index.php?page=login';
    </script>";
} else {
  echo "
    <script>alert('Data Gagal Disimpan');
      window.location='/reservasi/index.php?page=register';
    </script>";
}