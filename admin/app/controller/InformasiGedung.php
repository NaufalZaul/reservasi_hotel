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
  $nama_gedung = (int) $_POST["nama_gedung"];
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
  $sql = mysqli_query($conn, "DELETE FROM gedung WHERE id_gedung='$id_gedung'");

  if ($sql) {
    header('Location: /reservasi/admin/?filename=informasi_gedung');
  }
}


function fileImage()
{
  $file = $_FILES['foto_gedung'];
  if (!empty($file)) {
    //info file
    $filename = $file['name'];
    $filetype = pathinfo($filename, PATHINFO_EXTENSION);

    //file format
    $formattype = array('jpg', 'png', 'jpeg');
    if (in_array($filetype, $formattype)) {
      $image = $file['tmp_name'];
      $imageContent = addslashes(file_get_contents($image));
      return $imageContent;
    }
  }
}
