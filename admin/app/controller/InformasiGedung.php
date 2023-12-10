<?php
include "../config/koneksi.php";

if (isset($_POST['tambahdata'])) {
  addDataGedung();
} else if (isset($_POST['editdata'])) {
  editDataGedung();
} else {
  deleteDataGedung();
}

function addDataGedung()
{
  global $conn;
  $id_gedung = uniqid();
  $nama_gedung = $_POST["nama_gedung"];
  $foto_gedung = fileImage();
  $nama_pengurus = $_POST["nama_pengurus"];
  $kapasitas = $_POST["kapasitas"];
  $deskripsi = $_POST['deskripsi'];

  $sql = mysqli_query($conn, "INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `foto`, `nama_pengurus`, `kapasitas`, `deskripsi`) VALUES ('$id_gedung','$nama_gedung','$foto_gedung', '$nama_pengurus', '$kapasitas','$deskripsi')");

  if ($sql) {
    header('Location: /reservasi/admin/?filename=informasi_gedung');
  }
}

function editDataGedung()
{
  global $conn;
  $id_gedung = $_POST["id_gedung"];
  $nama_gedung = $_POST["nama_gedung"];
  $foto_gedung = fileImage();
  $nama_pengurus = $_POST["nama_pengurus"];
  $kapasitas = $_POST["kapasitas"];
  $deskripsi = $_POST['deskripsi'];

  if (empty($foto_gedung)) {
    $sql = mysqli_query($conn, "UPDATE gedung SET nama_gedung= '$nama_gedung',nama_pengurus='$nama_pengurus', kapasitas='$kapasitas', deskripsi= '$deskripsi' WHERE id_gedung='$id_gedung'");
  } else {
    $sql = mysqli_query($conn, "UPDATE gedung SET nama_gedung= '$nama_gedung', foto='$foto_gedung',nama_pengurus='$nama_pengurus', kapasitas='$kapasitas', deskripsi= '$deskripsi' WHERE id_gedung='$id_gedung'");
  }

  if ($sql) {
    header('Location: /reservasi/admin/?filename=informasi_gedung');
  }
}

function deleteDataGedung()
{
  global $conn;

  $id_gedung = $_GET['id_gedung'];
  $foto_gedung = getData($id_gedung);

  unlink('../../public/image/' . $foto_gedung['foto']);

  $sql = mysqli_query($conn, "DELETE FROM gedung WHERE id_gedung='$id_gedung'");

  if ($sql) {
    header('Location: /reservasi/admin/?filename=informasi_gedung');
  }
}

function getData($id)
{
  global $conn;
  $sql = mysqli_query($conn, "SELECT * FROM gedung WHERE id_gedung='$id'");

  return mysqli_fetch_array($sql);
}

function fileImage()
{
  $name_img = $_FILES['foto_gedung']['name'];

  if (!empty($name_img)) {
    $file = $_FILES['foto_gedung'];
    $unique_file_name = uniqid() . '_' . strtolower($file['name']);
    $file_tmp = $file['tmp_name'];

    move_uploaded_file($file_tmp, "../../public/image/" . $unique_file_name);
    return $unique_file_name;
  } else {
    return $name_img;
  }
}
