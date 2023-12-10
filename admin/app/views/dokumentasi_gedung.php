<?php
include "app/config/koneksi.php";
$galeri = mysqli_query($conn, "SELECT * FROM galeri");

$arr = [];
foreach ($galeri as $key => $data) {
  array_push($arr, $data['nama_gedung']);
}
$nama_gedung = array_unique($arr);

?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dokumentasi Gedung</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dokumentasi">
                Tambah Dokumentasi Gedung</button>

            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Gedung</th>
                    <th class="w-full">Foto Gedung</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($nama_gedung as $key => $nama) { ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $nama ?></td>
                      <td class="border-0  d-flex">
                        <?php foreach ($galeri as $key => $data) {
                          if ($data['nama_gedung'] == $nama) {
                        ?>
                            <span style="width: 350px;height: 200px;">
                              <img src="public/image/gallery/<?= $data['foto_gedung'] ?>" alt="" class="w-100 h-100" style="filter: brightness(.5); object-fit:cover;">
                            </span>
                        <?php }
                        } ?>
                      </td>
                      <td id="button-aksi">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalhapus-<?= $key ?>">Hapus</button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "app/components/ModalDokumentasiGedung.php" ?>
  </section>

</div>