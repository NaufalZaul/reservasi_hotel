<?php include "app/controller/access/session/start_session.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

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

  <link rel="stylesheet" href="public/styles/style.css">



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

  <!-- AdminLTE App -->
  <script src="public/dist/js/adminlte.js"></script>
  <script src="public/scripts/script.js"></script>

  <!-- AdminLTE for demo purposes -->
  <!-- <script src="public/dist/js/demo.js"></script> -->

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="public/dist/js/pages/dashboard.js"></script> -->
  <script src="public/scripts/toggle_button.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php
    include 'app/components/Navbar.php';
    include 'app/components/Sidebar.php';

    empty($_GET['filename']) ?
      include 'app/views/informasi_gedung.php' :
      include 'app/views/' . $_GET['filename'] . '.php';
    ?>
  </div>

</body>

</html>