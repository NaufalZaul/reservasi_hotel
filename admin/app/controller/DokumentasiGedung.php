<?php
include "../config/koneksi.php";

if (isset($_POST['tambahdokumentasi'])) {
  addDokumentasiGedung();
} else {
  deleteDokumentasiGedung();
}

function addDokumentasiGedung()
{
  global $conn;
  $id_galeri = uniqid();
  $nama_gedung = $_POST["nama_gedung"];
  $foto_gedung = fileImage();

  $sql = mysqli_query($conn, "INSERT INTO `galeri` (`id_galeri`, `nama_gedung`, `foto_gedung`) VALUES ('$id_galeri','$nama_gedung','$foto_gedung')");

  if ($sql) {
    header('Location: /reservasi/admin/?filename=dokumentasi_gedung');
  }
}


function deleteDokumentasiGedung()
{
  global $conn;

  $nama_gedung = $_GET['nama_gedung'];
  $foto_galeri = getData($nama_gedung);

  foreach ($foto_galeri as $key => $value) {
    unlink('../../public/image/gallery/' . $value[2]);
  }

  $sql = mysqli_query($conn, "DELETE FROM `galeri` WHERE nama_gedung='$nama_gedung'");

  if ($sql) {
    header('Location: /reservasi/admin/?filename=dokumentasi_gedung');
  }
}

function getData($nama)
{
  global $conn;
  $sql = mysqli_query($conn, "SELECT * FROM galeri WHERE nama_gedung='$nama'");

  return mysqli_fetch_all($sql);
}

function fileImage()
{
  $file = $_FILES['foto_gedung'];
  $unique_file_name = uniqid() . '_' . strtolower($file['name']);
  $file_tmp = $file['tmp_name'];

  move_uploaded_file($file_tmp, "../../public/image/gallery/" . $unique_file_name);
  return $unique_file_name;
}
