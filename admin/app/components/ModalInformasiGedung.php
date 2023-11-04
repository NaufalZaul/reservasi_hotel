<?php
include "app/config/koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM gedung");
?>
<!-- Modal Tambah Data-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="app/controller/InformasiGedung.php" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Tambahkan Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nomor Gedung</label>
              <input type="number" class="form-control" name="nomor_gedung" id="exampleInputEmail1"
                placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Foto Gedung</label>
              <input type="file" class="form-control" name="foto_gedung" id="exampleInputPassword1"
                placeholder="Password" value="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nama Pengurus</label>
              <input type="text" class="form-control" name="nama_pengurus" id="exampleInputPassword1"
                placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kapasitas</label>
              <input type="number" class="form-control" name="kapasitas" id="exampleInputPassword1"
                placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="exampleInputPassword1" cols="30" rows="8"
                placeholder="Tulis deskripsi gedung"></textarea>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="tambahdata" class="btn btn-primary">Save changes</button>
          </div>
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
      <form action="app/controller/InformasiGedung.php" method="POST" enctype="multipart/form-data">
        <!-- masih terlihat -->
        <input type="text" name="id_gedung" value="<?= $data['id_gedung'] ?>" hidden>
        <!-- masih terlihat -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nomor Gedung</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                name="nomor_gedung" value="<?= $data['id_gedung'] ?>">
            </div>
            <div class="form-group">
              <label>Foto Gedung</label>
              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['foto']) ?>" alt="Image"
                class="w-100 h-100" style="object-fit:cover;">
              <label for="exampleInputEmail1" class="mt-2">*Ubah Foto</label>
              <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                name="foto_gedung">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Pengurus</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                name="nama_pengurus" value="<?= $data['nama_pengurus'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kapasitas</label>
              <input type="number" class="form-control" name="kapasitas" id="exampleInputPassword1"
                placeholder="Password" value="<?= $data['kapasitas'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="exampleInputPassword1" cols="30" rows="8">
                <?= $data['deskripsi'] ?>
               </textarea>
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
      <form action="app/controller/InformasiGedung.php" method="GET">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h1>yakin hapus data kamar?</h1>
          <input type="text" class="form-control" name="id_gedung" id="exampleInputPassword1" placeholder="Password"
            value="<?= $data['id_gedung'] ?>" hidden>
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