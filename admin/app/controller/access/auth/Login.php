<?php
include "../../../config/koneksi.php";

session_start();

// $id = uniqid();
// $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$username = $_POST["username"];
$password =$_POST["password"];

// mysqli_query($conn, "INSERT INTO `admin` (`id`, `nama`, `username`,`password`, `level`) VALUES ('$id','Administrator','$username','$password','Admin')");


if ($username != "" && $password != "") {

  $get_password = mysqli_query($conn, "SELECT password FROM admin WHERE username = '$username'");
  $get_password = mysqli_query($conn, "SELECT password FROM admin WHERE username = '$username'");
  $data = mysqli_fetch_array($get_password);

  if (!empty($data)) {
    $hashing_password = $data['password'];

    if (password_verify($password, $hashing_password)) {
      $get_data = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$hashing_password' LIMIT 1");
      $all_data = mysqli_fetch_array($get_data);

      $_SESSION["username"] = $all_data["username"];
      $_SESSION["nama"] = $all_data["nama"];

      header("location: /reservasi/admin");
    } else {
      header("location: /reservasi/admin/app/views/layout_access/login.php");
    }
  }
}