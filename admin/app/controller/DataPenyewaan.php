<?php
include "../config/koneksi.php";
require "Email.php";

$data = (object) [
  "id_penyewaan" => $_POST["id_penyewaan"],
  "keperluan" => $_POST["keperluan"],
  "instansi" => $_POST["instansi"],
  "penanggung_jawab" => $_POST["penanggung_jawab"],
  "no_telp" => $_POST["no_telp"],
  "email" => $_POST["email"],
  "tanggal_mulai" => $_POST["tanggal_mulai"],
  "tanggal_akhir" => $_POST["tanggal_akhir"],
  "jumlah_peserta" => $_POST["jumlah_peserta"],
  "status" => $_POST["status"],
  "balasan" => $_POST["pesan_balasan"]
];

$query = mysqli_query($conn, "UPDATE `penyewaan` SET status='$data->status' WHERE id_penyewaan='$data->id_penyewaan'");

Email($data);
