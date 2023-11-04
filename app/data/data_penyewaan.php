<?php
include "../config/koneksi.php";

$sql = mysqli_query($conn, "SELECT * FROM penyewaan");
$get_data = mysqli_fetch_all($sql);

echo json_encode($get_data);
