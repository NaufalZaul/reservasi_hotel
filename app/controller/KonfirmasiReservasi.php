<?php
require "./KodeCaptcha.php";

$file = $_FILES['surat_pengantar'];
$file_name = $file['name'];
$unique_file_name = uniqid() . '_' . strtolower($file['name']);
$file_tmp = $file['tmp_name'];

move_uploaded_file($file_tmp, "../../public/temp/" . $unique_file_name);

$_SESSION['data-konfirmasi'] = $_POST;
$_SESSION['surat_pengantar'] = ['name' => $file_name, 'unique_name' => $unique_file_name];

createCode();
header('location: /hotel/?page=konfirmasi_reservasi&gedung=' . $_POST['gedung'] . '&konfirmasi=menunggu');
