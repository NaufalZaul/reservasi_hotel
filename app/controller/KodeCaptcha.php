<?php

//mengaktifkan session
session_start();
function createCode()
{

  header("Content-type: image/png");

  // menentukan session
  $_SESSION["Captcha"] = "";


  // Membuat gambar baru
  $image = imagecreatetruecolor(300, 100);

  // Mengatur warna latar belakang
  $bg_color = imagecolorallocate($image, 121, 113, 234);
  imagefill($image, 0, 0, $bg_color);

  // Mengatur warna teks
  $text_color = imagecolorallocate($image, 255, 255, 255);

  // Mengatur font TrueType (gantilah dengan path font yang sesuai di sistem Anda)
  $font = '../../public/NanumBrushScript-Regular.ttf';

  $text = '';

  for ($i = 0; $i <= 5; $i++) {
    // jumlah karakter
    $angka = rand(0, 9);
    $_SESSION["Captcha"] .= $angka;
    // Menambahkan teks ke gambar
    $text .= $angka;
  }

  imagettftext($image, 40, 0, 50, 70, $text_color, $font, $text);
  // Simpan gambar sebagai file PNG
  imagepng($image, "../../public/kode.png");

  // Hapus gambar dari memori
  imagedestroy($image);
}
;

function confirmCode()
{
  return $_SESSION['Captcha'] === $_POST['kode'] ? true : false;
}
