<?php
include "app/config/koneksi.php";
$gedung = mysqli_query($conn, "SELECT * FROM gedung");;
$galeri = mysqli_query($conn, "SELECT * FROM galeri");;
?>

<div class="site-section">
  <div class="px-5">
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-interval="10000">
          <img src="public/images/francesca-saraco-_dS27XGgRyQ-unsplash.jpg" alt="Image" class="w-100" height="500"
            style="object-fit: cover;">
        </div>
        <div class="carousel-item" data-interval="2000">
          <img src="public/images/rhema-kallianpur-jbJ-_hw2yag-unsplash.jpg" alt="Image" class="w-100" height="500"
            style="object-fit: cover;">
        </div>
        <div class="carousel-item">
          <img src="public/images/fernando-alvarez-rodriguez-M7GddPqJowg-unsplash.jpg" alt="Image" class="w-100"
            height="500" style="object-fit: cover;">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselExampleInterval" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselExampleInterval" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>
    <div class="section-heading text-center">
      <h2 class="my-5">Tentang Kami</h2>
      <div class="row align-items-center justify-content-around">
        <div class="col-md-6">
          <p class="mb-4 text-left" style="font-size: 18px;">Distrik Bisnis dapat dicapai dengan berjalan kaki dan hanya
            20 menit dari Bandara Minangkabau, hotel Mercure Padang dengan 146 kamar dilengkapi 1 Ballroom dan 5 ruang
            rapat. Tempat
            yang ideal untuk rapat bisnis, seminar, peluncuran produk, pernikahan, dan acara sosial lainnya.
            Hotel Mercure Padang berlokasi strategis tepat di pusat kota Padang. Nikmati berbelanja di pusat
            perbelanjaan dekat hotel atau manfaatkan Pusat Konvensi Padang.
            <br><br>
            Baik berkunjung untuk bisnis maupun
            berlibur, hotel Mercure ini menawarkan tempat menginap ideal untuk menjelajahi berbagai tengara kota
            yang penting dan beragam tempat wisata, serta untuk berbisnis.
            Padang adalah salah satu pusat bisnis di Indonesia. Terletak dekat pantai dan pegunungan, Mercure
            Padang berada dekat dengan banyak daya tarik ekowisata, memastikan keseimbangan sempurna antara
            aktivitas bisnis dan rekreasi Anda.
          </p>
        </div>
        <div class="col-md-5 mb-5 mb-md-0">
          <img src="public/images/francesca-saraco-_dS27XGgRyQ-unsplash.jpg" alt="Image" class="img-fluid w-100">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="px-5">
    <div class="">
      <div class="mx-auto text-center mb-3 section-heading">
        <h2 class="mb-5">Pilihan Gedung</h2>
      </div>
    </div>

    <div class="row">
      <?php
      foreach ($gedung as $key => $sql) {
        if ($key < 6) {
      ?>
      <div class="col-md-4 col-lg-4 my-3">
        <div class="hotel-room text-center position-relative">
          <a href="?page=detail_gedung&gedung=<?= $sql['nama_gedung'] ?>">
            <img src="admin/public/image/<?= $sql['foto'] ?>" alt="Image" class="w-100"
              style="height: 300px; filter: brightness(.5); object-fit:cover;">
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
      }
      ?>
    </div>
    <div class="text-center mt-4">
      <a href="?page=reservasi" class="btn btn-primary border text-white px-4 py-2">Selengkapnya</a>
    </div>
  </div>
</div>
<?php $gedung->data_seek(0); ?>
<div class="site-section">
  <div class="px-5">
    <div class="">
      <div class="mx-auto text-center mb-5 section-heading">
        <h2 class="mb-5">Dokumentasi Gedung</h2>
      </div>
    </div>

    <div class="row">
      <?php
      foreach ($galeri as $key => $sql) {
        if ($key < 6) {
      ?>
      <div class="col-md-4 col-lg-4 my-3">
        <div class="hotel-room text-center position-relative">
          <img src="admin/public/image/gallery/<?= $sql['foto_gedung'] ?>" alt="Image" class="w-100 shadow-sm"
            style="height: 300px; object-fit:cover;">
        </div>
      </div>
      <?php }
      } ?>
    </div>

    <div class="text-center mt-4">
      <a href="?page=galeri" class="btn btn-primary border text-white px-4 py-2">Selengkapnya</a>
    </div>
  </div>
</div>