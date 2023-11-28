<?php
include "app/config/koneksi.php";
$gedung = mysqli_query($conn, "SELECT * FROM gedung");
?>
<div class="site-section bg-light">
  <div class="px-5">
    <div class="">
      <div class="mx-auto text-center mb-5 section-heading">
        <h2 class="mb-5">Pilihan Gedung Bakorwil I Madiun</h2>
      </div>
    </div>

    <div class="row">
      <?php while ($sql = mysqli_fetch_array($gedung)) {
      ?>
      <div class="col-md-4 col-lg-4 my-3">
        <div class="hotel-room text-center position-relative">
          <a href="?page=detail_gedung&gedung=<?= $sql['nama_gedung'] ?>">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($sql['foto']) ?>" alt="Image"
              class="w-100" style="height: 300px; filter: brightness(.5); object-fit:cover;">
            <div class="position-absolute px-4 py-2" style="bottom: 0;left: 0;">
              <h3 class="heading text-left text-white m-0">
                Gedung <?= $sql['nama_gedung'] ?>
              </h3>
              <p class="text-white mb-1 text-capitalize" style="font-size: 18px;">
                Pengurus: <?= $sql['nama_pengurus'] ?>
              </p>
            </div>
          </a>
        </div>
      </div>
      <?php }
      ?>
    </div>
  </div>
</div>