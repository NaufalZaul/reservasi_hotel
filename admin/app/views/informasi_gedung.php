<?php
include "app/config/koneksi.php";
$gedung = mysqli_query($conn, "SELECT * FROM gedung");
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Informasi Gedung</h1>
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

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Tambah Data</button>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Gedung</th>
                    <th scope="col">Nama Pengurus</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($gedung as $key => $data) { ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $data['nama_gedung'] ?></td>
                    <td><?= $data['nama_pengurus'] ?></td>
                    <td><?= $data['kapasitas'] ?></td>
                    <td style="max-width: 300px;"><?= $data['deskripsi'] ?></td>
                    <td id="button-aksi">
                      <button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#modaledit-<?= $key ?>">Edit</button>
                      <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#modalhapus-<?= $key ?>">Hapus</button>
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
    <?php include "app/components/ModalInformasiGedung.php" ?>
  </section>
</div>