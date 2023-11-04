<?php
include "app/config/koneksi.php";
$gedung = mysqli_query($conn, "SELECT foto FROM gedung");
?>
<div class="site-section bg-light">
  <div class="px-5">
    <div class="">
      <div class="mx-auto text-center mb-5 section-heading">
        <h2 class="mb-5">Dokumentasi Gedung Bakorwil I Madiun</h2>
      </div>
    </div>

    <div class="row">
      <?php while ($sql = mysqli_fetch_array($gedung)) { ?>
      <div class="col-md-4 col-lg-4 my-3">
        <div class="hotel-room text-center position-relative">
          <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($sql['foto']) ?>" alt="Image"
            class="w-100" style="height: 300px; object-fit:cover;">
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>