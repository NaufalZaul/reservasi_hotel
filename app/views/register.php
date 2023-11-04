<div class="mx-auto p-5">
  <h2 class="text-center text-uppercase mt-5">
    <strong>HALAMAN Registrasi</strong>
  </h2>
  <form enctype="multipart/form-data" action="app/controller/Registrasi.php" method="POST"
    class="p-5 bg-white mx-auto w-75">
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label class="font-weight-bold" for="fullname">Nama Lengkap</label>
          <input type="text" id="fullname" name="nama" class="form-control" placeholder="Nama lengkap">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="username">Username</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label class="font-weight-bold" for="no_telp">No Telepon</label>
          <input type="number" id="no_telp" name="no_telp" class="form-control" placeholder="Nomor telepon">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="jk">Pilih Jenis Kelamin</label>
          <select class="form-control" id="jk" name="jenis_kelamin" aria-label="Default select example">
            <option selected>Jenis kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="alamat">Alamat</label>
          <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Masukan alamat">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="kota_asal">Kota Asal</label>
          <input class="form-control" type="text" name="kota_asal" id="kota_asal" placeholder="Masukkan Kota Asal">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="">
        <input type="submit" name="submit" value="Registrasi" class="btn btn-primary px-4 py-2">
      </div>
    </div>
  </form>
</div>