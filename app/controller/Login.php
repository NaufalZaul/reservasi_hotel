<?php include '../config/koneksi.php';

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

if ($username != "" && $password != "") {

  $get_password = mysqli_query($conn, "SELECT password FROM penyewa WHERE username = '$username'");
  $data = mysqli_fetch_array($get_password);

  if (!empty($data)) {
    $hashing_password = $data['password'];

    if (password_verify($password, $hashing_password)) {
      $get_data = mysqli_query($conn, "SELECT * FROM penyewa WHERE username = '$username' AND password = '$hashing_password' LIMIT 1");
      $all_data = mysqli_fetch_array($get_data);

      $_SESSION["id_penyewa"] = $all_data["id_penyewa"];
      $_SESSION["email"] = $all_data["email"];
      $_SESSION["username"] = $all_data["username"];
      $_SESSION["nama"] = $all_data["nama_lengkap"];
      $_SESSION["no_telp"] = $all_data["no_telp"];

      header("location: /hotel/");
    }
  } else {
    header("location: /hotel/?page=login&kesalahan=email_pass");
  }
} else {
  header("location: /hotel/?page=login&kesalahan=kosong");
}