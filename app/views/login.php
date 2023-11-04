<div class="w-50 mx-auto p-5">
  <h2 class="text-center text-uppercase mt-5">
    <strong>HALAMAN LOGIN</strong>
  </h2>
  <div id="info" class="my-3">
    <?php
    if (isset($_GET['kesalahan'])) {
      if ($_GET['kesalahan'] == 'email_pass') { ?>
        <div class='alert alert-danger alert-dismissable'>
          <button type='button' class='close ms-3' data-dismis='alert' aria-hiden='true'> &times;</button>
          Username atau password salah
        </div>
      <?php } else if ($_GET['kesalahan'] == 'kosong') { ?>
        <div class='alert alert-danger alert-dismissable'>
          <button type='button' class='close' data-dismis='alert' aria-hiden='true'>&times;</button>
          Username atau password tidak boleh kosong!
        </div>
    <?php }
    } ?>
  </div>
  <form action="app/controller/Login.php" method="POST" class="bg-white mx-auto">
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label class="font-weight-bold" for="username">Username</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="">
        <input type="submit" name="submit" value="Login" class="btn btn-primary px-4 py-2">
      </div>
    </div>
  </form>
</div>