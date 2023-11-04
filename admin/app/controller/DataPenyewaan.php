<?php
include "../config/koneksi.php";
require "Email.php";

$data = (object) [
  "email" => $_POST["email"],
  "status" => $_POST["status"],
  "feedback" => $_POST["feedback"],
];


foreach ($data->email as $key => $value) {
  $query = mysqli_query($conn, "UPDATE `penyewaan` SET status='$data->status' WHERE email='$value'");
}

Email($data);
