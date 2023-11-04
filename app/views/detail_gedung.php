<?php
include "app/config/koneksi.php";
$gedung = mysqli_query($conn, "SELECT * FROM gedung");

while ($row = mysqli_fetch_array($gedung)) {
  if ($row['nomor_gedung'] == $_GET['gedung']) {
?>
<div class="site-section" style="min-height: 100vh;">
  <div class="px-5">
    <div class="text-center">
      <h1 class="mt-5 mb-4" style="font-weight: 700;">Detail Gedung <?= $row['nomor_gedung'] ?></h1>
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['foto']) ?>" alt="Image"
        class="img-fluid w-75 mx-auto">
    </div>
    <article class="py-4" style="font-size: 18px;"><?= $row['deskripsi'] ?></article>
    <div class="">
      <h4 class="my-4">Beberapa dokumentasi gedung</h4>
      <div class="d-flex justify-content-around">
        <img src="public/images/fernando-alvarez-rodriguez-M7GddPqJowg-unsplash.jpg" alt="Image" class="img-fluid"
          width="400px">
        <img src="public/images/fernando-alvarez-rodriguez-M7GddPqJowg-unsplash.jpg" alt="Image" class="img-fluid"
          width="400px">
        <img src="public/images/fernando-alvarez-rodriguez-M7GddPqJowg-unsplash.jpg" alt="Image" class="img-fluid"
          width="400px">
      </div>
    </div>
    <div class="text-center mt-5">
      <a href="?page=formulir_reservasi&gedung=<?= $_GET['gedung'] ?>" class="btn border text-white px-4 py-2"
        style="background-color: #0d6efd;">Pesan Gedung
        Sekarang</a>
    </div>
  </div>
</div>
<?php }
} ?>