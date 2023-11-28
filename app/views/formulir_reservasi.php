<?php
if (isset($_GET['status'])) {
  if ($_GET['status'] == 'sukses') {
    echo '<script>alert("Pemesanan gedung bakorwil sedang di proses, silahkan cek email untuk update selanjutnya")</script>';
  } else {
    echo '<script>alert("Penyewaan gedung ' . $_GET['gedung'] . ' ' . $_GET['status'] . '")</script>';
  }
}
?>
<div class="site-section bg-light">
  <div class="px-5">
    <div class="row">
      <div class="col-md-6 mx-auto text-center mb-5 section-heading">
        <h2 class="mb-5">Penyewaan Gedung
          <?= $_GET['gedung'] ?>
        </h2>
      </div>
    </div>

    <section class="content row">
      <div class="container-fluid col-md-9 mx-auto">
        <div class="card card-primary">
          <div id="calendar"></div>
        </div>
      </div>
    </section>

    <div class="mt-5">
      <div class="mx-auto text-center section-heading">
        <h2 class="mb-5">Formulir Penyewaan Gedung
          <?= $_GET['gedung'] ?>
        </h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9 mx-auto" data-aos="fade-up" data-aos-delay="100">
        <form action="app/controller/KonfirmasiReservasi.php" method="POST" class="bg-white p-md-5 p-4 mb-5 border"
          enctype="multipart/form-data">
          <input type="text" name="gedung" value="<?php echo $_GET['gedung']; ?>" hidden />

          <div class="form-group">
            <label class="text-black font-weight-bold" for="keperluan">Keperluan</label>
            <select class="form-select w-100 p-2 rounded text-secondary" name="keperluan"
              aria-label="Default select example" style="border-color: gainsboro;">
              <option selected>Keperluan penyewaan</option>
              <option value="Rapat/Workshop/Seminar">Rapat/Workshop/Seminar</option>
              <option value="Resepsi">Resepsi</option>
              <option value="Prewedding">Prewedding</option>
              <option value="Lain-Lain">Lain-Lain</option>
            </select>
          </div>

          <div class="form-group">
            <label class="text-black font-weight-bold" for="instansi">Instansi / Organisasi</label>
            <input type="text" id="instansi" name="instansi" class="form-control"
              placeholder="Nama instansi / organisasi" />
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="penanggung_jawab">Penanggung Jawab</label>
            <input type="text" id="penanggung_jawab" name="penanggung_jawab" class="form-control text-capitalize"
              placeholder="Penanggung Jawab" />
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="no_telp">Telepon</label>
            <input type="number" id="no_telp" name="no_telp" class="form-control " placeholder="Nomor telepon" />
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control " placeholder="Email" />
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="tanggal_mulai">Tanggal Mulai</label>
            <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control">
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="tanggal_akhir">Tanggal Akhir</label>
            <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control">
          </div>
          <div class="form-group">
            <label for="jumlah_peserta" class="font-weight-bold text-black">Jumlah Peserta</label>
            <input type="number" name="jumlah_peserta" id="jumlah_peserta" class="form-control"
              placeholder="Jumlah peserta">
          </div>
          <div class="form-group">
            <label for="surat_pengantar">Upload Surat Pengantar</label>
            <input type="file" class="form-control" name="surat_pengantar" id="surat_pengantar"
              placeholder="Surat Pengantar">
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="message">Deskripsi</label>
            <textarea name="deskripsi" id="message" class="form-control " cols="30" rows="8"
              placeholder="Tulis deskripsi keperluan"></textarea>
          </div>
          <div class="form-group">
            <button class="btn btn-primary px-4 py-2" id="konfirmasi" name="sewa">Sewa sekarang</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>