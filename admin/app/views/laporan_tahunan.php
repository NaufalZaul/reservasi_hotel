<?php
include "app/config/koneksi.php";

if (isset($_POST['cari_tahun'])) {
  $filter = $_POST['tahun'];

  var_dump($filter);
  $sql = mysqli_query($conn, "SELECT * FROM penyewaan 
    WHERE YEAR(tanggal_mulai) = '$filter' ");
} else {
  $sql = mysqli_query($conn, "SELECT * FROM penyewaan");
}

?>

<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan Tahunan</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="row p-3">
              <form action="" method="post" class="d-flex col">
                <input type="number" class="form-control w-75" name="tahun" id="" placeholder="Masukkan tahun">
                <button type="submit" name="cari_tahun" class="btn btn-primary mx-2">Cari laporan</button>
              </form>

              <a href="app/controller/HandleCetakLaporan.php?cetak=tahunan" target="_blank" class="col text-right">
                <button type="submit" name="cetak_bulanan" class="btn btn-primary"> Cetak Laporan</button>
              </a>
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
                    <th>Jumlah Peserta</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($sql as $key => $data) {
                  ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $data['nama_gedung'] ?> </td>
                      <td><?= $data['penanggung_jawab'] ?> </td>
                      <td><?= $data['no_telp'] ?> </td>
                      <td><?= $data['tanggal_mulai'] ?> </td>
                      <td><?= $data['tanggal_akhir'] ?> </td>
                      <td>
                        <?= empty($data['surat_pengantar']) ? 'tidak ada' : 'ada' ?>
                      </td>
                      <td><?= $data['jumlah_peserta'] ?> </td>
                      <td><?= $data['status'] ?></td>
                    </tr>
                  <?php }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>