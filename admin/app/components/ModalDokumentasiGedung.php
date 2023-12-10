<?php
include "app/config/koneksi.php";
$galeri = mysqli_query($conn, "SELECT * FROM galeri");
?>

<!-- Modal Tambah Dokumentasi-->
<div class="modal fade" id="modal-dokumentasi">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="app/controller/DokumentasiGedung.php" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <span>
            <h4 class="modal-title">Tambah Dokumentasi Gedung</h4>
            <p class="text-secondary">Tambahkan dokumentasi setiap gedung, agar pengguna mengetahui model gedung sebelum
              disewa</p>
          </span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Gedung</label>
              <input type="text" class="form-control" name="nama_gedung" id="exampleInputEmail1"
                placeholder="Nama gedung">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Foto Gedung</label>
              <input type="file" class="form-control" name="foto_gedung" id="exampleInputPassword1"
                placeholder="Foto gedung" value="">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
            <button type="submit" name="tambahdokumentasi" class="btn btn-primary">Simpan data</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Tambah Dokumentasi-->

<?php foreach ($galeri as $key => $data) { ?>
<!-- Modal Hapus Data-->
<div class="modal fade" id="modalhapus-<?= $key ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="app/controller/DokumentasiGedung.php" method="GET">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data Gedung</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4>Yakin ingin menghpus dokumentasi gedung <?= $data['nama_gedung'] ?></h4>
          <input type="text" class="form-control" name="nama_gedung" value="<?= $data['nama_gedung'] ?>" hidden>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
          <button type="submit" name="hapusdata" class="btn btn-primary">Hapus Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Hapus Data-->
<?php } ?>