<?php
include "app/config/koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM gedung");
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Kamar</h1>
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
              <!-- <form action="app/controller/Email.php" method="post">
                <button type="submit" class="btn btn-primary">KIRIMKAN</button>
              </form> -->

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Tambah Data</button>

              <button type="button" id="showing-edit-btn" class="btn btn-warning">
                Edit Data</button>

              <button type="button" id="showing-hapus-btn" class="btn btn-danger">
                Hapus Data</button>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Gedung</th>
                    <th>Nama Pengurus</th>
                    <th>Kapasitas</th>
                    <th>Deskripsi</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($sql as $key => $data) { ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $data['nomor_gedung'] ?></td>
                    <td><?= $data['nama_pengurus'] ?></td>
                    <td><?= $data['kapasitas'] ?></td>
                    <td><?= $data['deskripsi'] ?></td>
                    <td id="button-aksi">
                      <button type="button" id="btn-edit-data" class="btn btn-warning" data-toggle="modal"
                        data-target="#modaledit-<?= $key ?>">Edit</button>
                      <button type="button" id="btn-hapus-data" class="btn btn-danger" data-toggle="modal"
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