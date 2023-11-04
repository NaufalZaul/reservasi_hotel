<?php
include "../../../config/koneksi.php";

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

if ($username != "" && $password != "") {

  $get_password = mysqli_query($conn, "SELECT password FROM admin WHERE username = '$username'");
  $data = mysqli_fetch_array($get_password);

  if (!empty($data)) {
    $hashing_password = $data['password'];

    if (password_verify($password, $hashing_password)) {
      $get_data = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$hashing_password' LIMIT 1");
      $all_data = mysqli_fetch_array($get_data);

      $_SESSION["username"] = $all_data["username"];
      $_SESSION["nama"] = $all_data["nama"];

      header("location: /hotel/admin");
    } else {
      header("location: /hotel/admin/app/views/layout_access/login.php");
    }
  }
}
