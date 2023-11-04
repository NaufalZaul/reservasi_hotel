<?php
include "app/config/koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM penyewaan");
?>
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Penyewaan</h1>
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
              <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#modal-balasan">Balasan</button>
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
                  <?php foreach ($sql as $key => $data) { ?>
                  <tr>
                    <td>
                      <?= $key + 1 ?>
                    </td>
                    <td>
                      <?= $data['nomor_gedung'] ?>
                    </td>
                    <td>
                      <?= $data['penanggung_jawab'] ?>
                    </td>
                    <td>
                      <?= $data['no_telp'] ?>
                    </td>
                    <td>
                      <?= $data['tanggal_mulai'] ?>
                    </td>
                    <td>
                      <?= $data['tanggal_akhir'] ?>
                    </td>
                    <td>
                      <a href="?filename=lihat_pdf&surat_pengantar=<?= $data['surat_pengantar'] ?>"
                        target="_blank"><u>Lihat Surat</u></a>
                      <!-- <object data="app/views/<?= $data['surat_pengantar'] ?>" type="application/pdf" width="500px" 
                    -->
                    </td>
                    <td>
                      <?= $data['jumlah_orang'] ?>
                    </td>
                    <td>
                      <?= $data['status'] ?>
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
  </section>
  <?php include "app/components/ModalDataPenyewaan.php" ?>
</div>