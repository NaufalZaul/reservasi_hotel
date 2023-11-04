<?php
if (isset($_POST['logout'])) {
  session_start();
  session_destroy();
  echo "<script>window.location.href='?page=beranda'; </script>";
}
?>

<div class="site-navbar-wrap js-site-navbar">
  <div class="px-5">
    <div class="site-navbar bg-black">
      <div class="py-1">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto">
            <h2 class="mb-0 site-logo">
              <a href="index.php" class="d-flex align-items-center">
                <img src="public/images/jawa timur.png" width="35">
                <p class="m-0 ml-3" style="font-weight: 600; color: #13C5DD;">Bakorwil I Madiun</p>
              </a>
            </h2>
          </div>
          <div class=" col-auto">
            <nav class="site-navigation text-right" role="navigation">
              <div class="container">
                <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3">
                  <a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span>
                  </a>
                </div>
                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="<?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'beranda') ? 'active' : '';
                              echo $aktif; ?>">
                    <a href="?page=beranda">beranda</a>
                  </li>
                  <li class="<?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'reservasi') ? 'active' : '';
                              echo $aktif; ?>">
                    <a href="?page=reservasi">reservasi</a>
                  </li>
                  <li class="<?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'galeri') ? 'active' : '';
                              echo $aktif; ?>">
                    <a href="?page=galeri">Galeri</a>
                  </li>
                  <li class="<?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'hubungi') ? 'active' : '';
                              echo $aktif; ?>">
                    <a href="?page=hubungi">Hubungi</a>
                  </li>

                  <?php if (@$_SESSION["username"] == "") { ?>
                    <!-- <li class="has-children <?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'login') ? 'active' : '';
                                                  echo $aktif; ?>">
                      <a href="?page=login">Daftar/Login</a>
                      <ul class="dropdown arrow-top">
                        <li class="<?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'login') ? 'active' : '';
                                    echo $aktif; ?>">
                          <a href="?page=login">Login</a>
                        </li>
                        <li class="<?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'register') ? 'active' : '';
                                    echo $aktif; ?>">
                          <a href="?page=register">Register</a>
                        </li>
                      </ul>
                    </li> -->
                  <?php } else { ?>
                    <!-- <li>
                      <form action="" method="POST">
                        <button type="submit" name="logout" class="border-0 text-danger bg-transparent text-uppercase" style="cursor: pointer;font-size: 15px;">
                          Logout
                        </button>
                      </form>
                    </li> -->
                  <?php } ?>
                  <li></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 
<div class="site-navbar-wrap js-site-navbar">
  <div class="px-5">
    <div class="site-navbar bg-black">
      <div class="py-1">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto">
            <h2 class="mb-0 site-logo">
              <a href="index.php?page=beranda" class="d-flex align-items-center">
                <img src="images/jawa timur.png" width="50" height="70">
                <p class="m-0 ml-3">Bakorwil I Madiun</p>
              </a>
            </h2>
          </div>
          <div class="col-auto">
            <nav class="site-navigation text-right" role="navigation">
              <div class="container">
                <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3">
                  <a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span>
                  </a>
                </div>
                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="<?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'tentang') ? 'active' : null;
                              echo $aktif; ?>">
                    <a href="?page=tentang">tentang</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->




<!-- <li class="<?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'reservasi') ? 'active' : '';
                echo $aktif; ?>">
  <a href="?page=reservasi">reservasi</a>
  <ul class="dropdown arrow-top" style="width: max-content;">
    <li class="<?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'reservasi') ? 'active' : '';
                echo $aktif; ?>">
      <a href="?page=reservasi">Pesan Tempat</a>
    </li>
    <li class="<?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'konfirmasi_pembayaran') ? 'active' : '';
                echo $aktif; ?>">
      <a href="?page=konfirmasi_pembayaran">Konfirmasi Pembayaran</a>
    </li>
    <li class="<?php $aktif = (isset($_GET['page']) && $_GET['page'] == 'cetak') ? 'active' : '';
                echo $aktif; ?>">
      <a href="?page=cetak">Cetak Pembayaran</a>
    </li>
  </ul>
</li> -->