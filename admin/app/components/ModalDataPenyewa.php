<?php
include "app/config/koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM penyewa");
?>

<!-- Modal Tambah Data-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="app/controller/DataPenyewa.php" method="POST">
        <div class="modal-header">
          <h4 class="modal-title">Tambahkan Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card-body">
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
            <div class="form-group">
              <label class="font-weight-bold" for="no_telp">No Telepon</label>
              <input type="number" id="no_telp" name="no_telp" class="form-control" placeholder="Nomor telepon">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki">
                <label class="form-check-label" for="laki-laki">Laki-Laki</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                <label class="form-check-label" for="perempuan">Perempuan</label>
              </div>
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
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="tambahdata" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Tambah Data-->


<?php foreach ($sql as $key => $data) { ?>

  <!-- Modal Edit Data-->
  <div class="modal fade" id="modaledit-<?= $key ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="app/controller/DataPenyewa.php" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <input type="text" name="id_penyewa" value="<?= $data['id_penyewa'] ?>" hidden>
              <div class="form-group">
                <label class="font-weight-bold" for="fullname">Nama Lengkap</label>
                <input type="text" id="fullname" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" value="<?= $data['nama_lengkap'] ?>">
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?= $data['username'] ?>">
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= $data['email'] ?>">
              </div>
              <div class="form-group d-flex flex-column">
                <label class="font-weight-bold" for="password">Password</label>
                <button type="button" class="btn btn-primary" id="show-password-input">Perbarui Password</button>
                <input type="password" id="password" name="password-baru" class="form-control password-input mt-2" placeholder="Password Baru">
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="no_telp">No Telepon</label>
                <input type="number" id="no_telp" name="no_telp" class="form-control" placeholder="Nomor telepon" value="<?= $data['no_telp'] ?>">
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki" <?= $data['jenis_kelamin'] == 'Laki-Laki' ? 'checked' : null ?>>
                  <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'checked' : null ?>>
                  <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="alamat">Alamat</label>
                <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Masukan alamat" value="<?= $data['alamat'] ?>">
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="kota_asal">Kota Asal</label>
                <input class="form-control" type="text" name="kota_asal" id="kota_asal" placeholder="Masukkan Kota Asal" value="<?= $data['kota_asal'] ?>">
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="editdata" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Edit Data-->

  <!-- Modal Hapus Data-->
  <div class="modal fade" id="modalhapus-<?= $key ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="app/controller/DataPenyewa.php" method="GET">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h1>yakin hapus data kamar? <?= $data['id_penyewa'] ?> </h1>
            <input type="text" class="form-control" name="id_penyewa" id="exampleInputPassword1" placeholder="Password" value="<?= $data['id_penyewa'] ?>" hidden>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="hapusdata" class="btn btn-primary">Hapus Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Hapus Data-->

<?php } ?>