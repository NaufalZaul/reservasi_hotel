<?php
function handleMenuActive($menu)
{
  echo isset($_GET['filename']) && $_GET['filename'] == $menu ? 'active' : null;
}

function handleMenuOpen($menu)
{
  echo isset($_GET['filename']) && $_GET['filename'] == $menu ? 'menu-open' : null;
}
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar">
    <div class="">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item user-panel py-3 <?php handleMenuOpen('profil') ?>">
          <a href="?filename=profil" class="nav-link">
            <div class="image pl-0">
              <img src="public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <p class="pl-2">Alexander Pierce</p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <form action="app/controller/access/session/delete_session.php">
                <button type="submit" class="nav-link text-white btn btn-danger">LOGOUT</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="?filename=informasi_gedung" class="nav-link <?php handleMenuActive('informasi_gedung') ?>">
            <i class="nav-icon fas fa-hotel"></i>
            <p>
              INFORMASI GEDUNG
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?filename=data_penyewa" class="nav-link <?php handleMenuActive('data_penyewa') ?>">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              DATA PENYEWA
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?filename=data_penyewaan" class="nav-link <?php handleMenuActive('data_penyewaan') ?>">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>
              DATA PENYEWAAN
            </p>
          </a>
        </li>
        <li class="nav-item 
        <?php handleMenuOpen('laporan_bulanan');
        handleMenuOpen('laporan_tahunan') ?>
        ">
          <a href="#" class="nav-link 
          <?php handleMenuActive('laporan_bulanan');
          handleMenuActive('laporan_tahunan') ?>
          ">
            <i class="nav-icon far fa-file-alt"></i>
            <p>
              LAPORAN
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="?filename=laporan_bulanan" class="nav-link <?php handleMenuActive('laporan_bulanan') ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>BULAN INI</p>
              </a>
            </li>
            <!-- <li class="nav-item <?= $_GET['filename'] == 'laporan_tahunan' ? 'menu-open' : null ?>"> -->
            <li class="nav-item">
              <a href="?filename=laporan_tahunan" class="nav-link <?php handleMenuActive('laporan_tahunan') ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>TAHUNAN</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</aside>