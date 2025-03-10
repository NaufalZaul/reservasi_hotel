<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Reservasi Hotel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../public/plugins/fontawesome-free/css/all.min.css" />
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../public/dist/css/adminlte.min.css" />
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <h2>LOGIN ADMINISTRATOR</h2>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masukkan username dan password sesuai untuk dapat mengelola data</p>

        <form action="../../controller/access/auth/Login.php" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4 mx-auto">
              <button type="submit" class="btn btn-primary btn-block">
                Masuk
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="../../../public/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../public/dist/js/adminlte.min.js"></script>
</body>

</html>