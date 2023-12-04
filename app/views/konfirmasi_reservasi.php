<?php
include 'app/config/koneksi.php';

function handelValue($name)
{
  echo isset($_GET['konfirmasi']) ? $_SESSION['data-konfirmasi'][$name] : null;
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
        <?php if (isset($_GET['konfirmasi'])) {
          if ($_GET['konfirmasi'] == 'salah') {
            echo '<script>alert("Kode Chaptca Salah")</script>';
        ?>
            <div class="alert alert-danger" role="alert">
              <h5>*Kode captcha salah</h5>
              <br>
              Cek kembali kebenaran data sebelum submit, apabila kurang sesuai silahkan diinputkan kembali, jika sudah
              sesuai silahkan lanjutkan dengan menekan tombol <a href="#konfirmasi" class="alert-link">Konfirmasi dan Sewa
                Gedung</a>
            </div>
          <?php } else { ?>
            <div class="alert alert-primary" role="alert">
              Cek kembali kebenaran data sebelum submit, apabila kurang sesuai silahkan diinputkan kembali, jika sudah
              sesuai silahkan lanjutkan dengan menekan tombol <a href="#konfirmasi" class="alert-link">Konfirmasi dan Sewa
                Gedung</a>
            </div>
        <?php }
        } ?>

        <form action="app/controller/Reservasi.php" method="POST" class="bg-white p-md-5 p-4 mb-5 border" enctype="multipart/form-data">
          <input type="text" name="gedung" value="<?php echo $_GET['gedung']; ?>" hidden />
          <div class="form-group">
            <label class="text-black font-weight-bold" for="judul_acara">Judul Acara</label>
            <select class="form-select w-100 p-2 rounded text-secondary" name="keperluan" aria-label="Default select example" style="border-color: gainsboro;">
              <option value="Rapat/Workshop/Seminar" <?= $_SESSION['data-konfirmasi']['keperluan'] == 'Rapat/Workshop/Seminar' ? 'selected' : null ?>>
                Rapat/Workshop/Seminar</option>
              <option value="Resepsi" <?= $_SESSION['data-konfirmasi']['keperluan'] == 'Resepsi' ? 'selected' : null ?>>
                Resepsi
              </option>
              <option value="Prewedding" <?= $_SESSION['data-konfirmasi']['keperluan'] == 'Prewedding' ? 'selected' : null ?>>
                Prewedding
              </option>
              <option value="Lain-Lain" <?= $_SESSION['data-konfirmasi']['keperluan'] == 'Lain-Lain' ? 'selected' : null ?>>Lain-Lain
              </option>
            </select>
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="instansi">Instansi / Organisasi</label>
            <input type="text" id="instansi" name="instansi" class="form-control" placeholder="Nama instansi / organisasi" value="<?= handelValue('instansi') ?>">
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="penanggung_jawab">Penanggung Jawab</label>
            <input type="text" id="penanggung_jawab" name="penanggung_jawab" class="form-control text-capitalize" placeholder="Penanggung Jawab" value="<?= handelValue('penanggung_jawab') ?>" />
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="no_telp">Telepon</label>
            <input type="number" id="no_telp" name="no_telp" class="form-control " value="<?= handelValue('no_telp') ?>" placeholder="Nomor telepon" />
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control " value="<?= handelValue('email') ?>" placeholder="Email" />
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="tanggal_mulai">Tanggal Mulai</label>
            <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" value="<?= handelValue('tanggal_mulai') ?>">
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="tanggal_akhir">Tanggal Akhir</label>
            <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control" value="<?= handelValue('tanggal_akhir') ?>">
          </div>
          <div class="form-group">
            <label for="jumlah_peserta" class="font-weight-bold text-black">Jumlah Peserta</label>
            <input type="number" name="jumlah_peserta" id="jumlah_peserta" class="form-control" placeholder="Jumlah peserta" value="<?= handelValue('jumlah_peserta') ?>">
          </div>
          <div class="form-group input-group d-flex flex-column">
            <label for="surat_pengantar" class="font-weight-bold text-black">Upload Surat Pengantar</label>
            <div class="custom-file w-100">
              <input type="file" class="custom-file-input" name="surat_pengantar" id="surat_pengantar" disabled>
              <label class="custom-file-label" for="surat_pengantar"><?= $_SESSION['surat_pengantar']['name'] ?></label>
            </div>
          </div>
          <div class="form-group">
            <label class="text-black font-weight-bold" for="message">Deskripsi</label>
            <textarea name="deskripsi" id="message" class="form-control " cols="30" rows="8" placeholder="Tulis deskripsi">
            <?= handelValue('deskripsi') ?>
          </textarea>
          </div>
          <div class="form-group d-flex flex-column">
            <label class="text-black font-weight-bold" for="kode">Kode Captcha</label>
            <img src="public/kode.png" alt="kode-captcha" width="300" height="100" class="mb-3" style="object-fit: cover;">
            <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan kode">
          </div>
          <div class="form-group">
            <button class="btn btn-primary px-4 py-2" id="konfirmasi" name="sewa">Konfirmasi dan Sewa Gedung</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>