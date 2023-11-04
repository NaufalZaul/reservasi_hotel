<?php
include 'app/config/koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hotel Mercure</title>
  <link rel="stylesheet" href="public/utils/css/style.css">
  <link rel="stylesheet" href="public/utils/fonts/icomoon/style.css">

  <!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="public/utils/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/utils/css/magnific-popup.css">
  <link rel="stylesheet" href="public/utils/css/jquery-ui.css">
  <link rel="stylesheet" href="public/utils/css/owl.carousel.min.css">
  <link rel="stylesheet" href="public/utils/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="public/utils/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="public/utils/css/animate.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
  <link rel="stylesheet" href="public/utils/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="public/utils/css/aos.css">


  <script src="public/utils/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="public/scripts/ajax.js"></script>
  <script type="text/javascript" src="public/scripts/calender.js"></script> -->



  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="public/plugins/toastr/toastr.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="public/plugins/fullcalendar/main.css">

  <!-- jQuery -->
  <script src="public/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="public/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="public/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- ChartJS -->
  <script src="public/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="public/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="public/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="public/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="public/plugins/moment/moment.min.js"></script>
  <script src="public/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Toastr -->
  <script src="public/plugins/toastr/toastr.min.js"></script>
  <!-- Summernote -->
  <script src="public/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- fullCalendar 2.2.5 -->
  <script src="public/plugins/moment/moment.min.js"></script>
  <script src="public/plugins/fullcalendar/main.js"></script>
  <!-- AdminLTE App -->
  <script src="public/dist/js/adminlte.js"></script>
  <script src="public/scripts/script.js"></script>

</head>

<body>
  <div class="site-wrap">
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    <?php
    include 'app/component/navbar.php';
    if (!empty($_GET["page"])) {
      include("app/views/" . $_GET["page"] . ".php");
    } else {
      include "app/views/beranda.php";
    }
    include 'app/component/footer.php';
    ?>
  </div>

  <script src="public/utils/js/bootstrap.min.js"></script>
  <!-- <script src="public/utils/js/popper.min.js"></script> -->
  <!-- <script src="public/utils/js/owl.carousel.min.js"></script> -->
  <!-- <script src="public/utils/js/jquery.countdown.min.js"></script> -->
  <!-- <script src="public/utils/js/bootstrap-datepicker.min.js"></script> -->
  <!-- <script src="public/utils/js/mediaelement-and-player.min.js"></script> -->
  <script src="public/utils/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="public/utils/js/jquery-ui.js"></script>
  <script src="public/utils/js/jquery.stellar.min.js"></script>
  <script src="public/utils/js/jquery.magnific-popup.min.js"></script>
  <script src="public/utils/js/aos.js"></script>
  <script src="public/utils/js/main.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var mediaElements = document.querySelectorAll('video, audio'),
        total = mediaElements.length;
      for (var i = 0; i < total; i++) {
        new MediaElementPlayer(mediaElements[i], {
          pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
          shimScriptAccess: 'always',
          success: function() {
            var target = document.body.querySelectorAll('.player'),
              targetTotal = target.length;
            for (var j = 0; j < targetTotal; j++) {
              target[j].style.visibility = 'visible';
            }
          }
        });
      }
    });
  </script>
</body>

</html>