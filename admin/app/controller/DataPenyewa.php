<?php
include "../config/koneksi.php";

if (isset($_POST['tambahdata'])) {
  addDataPenyewa();
} else if (isset($_POST['editdata'])) {
  editDataPenyewa();
} else {
  deleteDataPenyewa();
}


function addDataPenyewa()
{
  global $conn;

  $id_penyewa = uniqid();
  $nama_lengkap = $_POST['nama'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password-baru'], PASSWORD_DEFAULT);
  $no_telp = $_POST['no_telp'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $alamat = $_POST['alamat'];
  $kota_asal = $_POST['kota_asal'];

  if (empty($password)) {
    $query = "INSERT INTO `penyewa` (`id_penyewa`, `nama_lengkap`, `username`, `email`, `password`, `alamat`, `kota_asal`, `no_telp`, `jenis_kelamin`) VALUES ('$id_penyewa','$nama_lengkap','$username', '$email','$password','$alamat', '$kota_asal','$no_telp','$jenis_kelamin')";
  } else {
    $query = "INSERT INTO `penyewa` (`id_penyewa`, `nama_lengkap`, `username`, `email`, `alamat`, `kota_asal`, `no_telp`, `jenis_kelamin`) VALUES ('$id_penyewa','$nama_lengkap','$username', '$email', '$alamat', '$kota_asal','$no_telp','$jenis_kelamin')";
  }

  if (mysqli_query($conn, $query)) {
    header('Location: /hotel/admin/?filename=data_penyewa');
  }
}

function editDataPenyewa()
{
  global $conn;

  $id_penyewa = $_POST['id_penyewa'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $no_telp = $_POST['no_telp'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $alamat = $_POST['alamat'];
  $kota_asal = $_POST['kota_asal'];

  if (empty($_POST['password-baru'])) {
    $query = "UPDATE `penyewa` SET nama_lengkap='$nama_lengkap', username='$username', email='$email', no_telp='$no_telp', jenis_kelamin='$jenis_kelamin', alamat='$alamat', kota_asal='$kota_asal' WHERE id_penyewa='$id_penyewa'";
  } else {

    $password_baru = password_hash($_POST['password-baru'], PASSWORD_DEFAULT);

    $query = "UPDATE `penyewa` SET nama_lengkap='$nama_lengkap', username='$username', email='$email', password='$password_baru', no_telp='$no_telp', jenis_kelamin='$jenis_kelamin', alamat='$alamat', kota_asal='$kota_asal' WHERE id_penyewa='$id_penyewa'";
  }

  if (mysqli_query($conn, $query)) {
    header('Location: /hotel/admin/?filename=data_penyewa');
  }
}

function deleteDataPenyewa()
{
  global $conn;

  $id_penyewa = $_GET['id_penyewa'];
  $sql = mysqli_query($conn, "DELETE FROM penyewa WHERE id_penyewa='$id_penyewa'");

  if ($sql) {
    header('Location: /hotel/admin/?filename=data_penyewa');
  }
}
