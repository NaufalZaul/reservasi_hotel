<?php
include "app/config/koneksi.php";
include "app/controller/HandlingTimeLaporan.php";

$sql = mysqli_query($conn, "SELECT * FROM penyewaan");


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
              <a href="app/controller/HandleCetakLaporan.php?cetak=bulanan" target="_blank">
                <button type="submit" name="cetak_bulanan" class="btn btn-primary"> Cetak Laporan</button>
              </a>
              <!-- <form action="app/controller/HandleCetakLaporan.php" method="post">
                <button type="submit" name="cetak_bulanan" class="btn btn-primary">
                  Cetak Laporan</button>
              </form> -->
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Gedung</th>
                    <th>Penanggung Jawab</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Surat Pengantar</th>
                    <th>Jumlah Orang</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($sql as $key => $data) {
                    if (handlingTimeLaporan('bulanan', $data['tanggal_mulai'])) {
                  ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $data['nomor_gedung'] ?> </td>
                        <td><?= $data['penanggung_jawab'] ?> </td>
                        <td><?= $data['no_telp'] ?> </td>
                        <td><?= $data['tanggal_mulai'] ?> </td>
                        <td><?= $data['tanggal_akhir'] ?> </td>
                        <td>
                          <?= empty($data['surat_pengantar']) ? 'tidak ada' : 'ada' ?>
                        </td>
                        <td><?= $data['jumlah_orang'] ?> </td>
                        <td><?= $data['status'] ?></td>
                      </tr>
                  <?php }
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>