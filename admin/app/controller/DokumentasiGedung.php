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
  $nomor_gedung = (int) $_POST["nomor_gedung"];
  $foto_gedung = fileImage();

  $sql = mysqli_query($conn, "INSERT INTO `galeri` (`id_galeri`, `nomor_gedung`, `foto_gedung`) VALUES ('$id_galeri','$nomor_gedung','$foto_gedung')");

  if ($sql) {
    header('Location: /reservasi/admin/?filename=dokumentasi_gedung');
  }
}


function deleteDokumentasiGedung()
{
  global $conn;

  $id_galeri = $_GET['id_galeri'];
  $sql = mysqli_query($conn, "DELETE FROM `galeri` WHERE id_galeri='$id_galeri'");

  if ($sql) {
    header('Location: /reservasi/admin/?filename=dokumentasi_gedung');
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
