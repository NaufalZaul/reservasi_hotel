<?php
include "app/config/koneksi.php";
$query_penyewaan = mysqli_query($conn, "SELECT * FROM penyewaan");

foreach ($query_penyewaan as $key => $data) {
?>
<form action="app/controller/DataPenyewaan.php" method="POST">
  <input type="text" hidden name="id_penyewaan" value="<?= $data['id_penyewaan'] ?>">
  <!-- Modal Balasan-->
  <div class="modal fade" id="modal<?= $key ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="app/controller/DataPenyewa.php" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Balasan untuk <?= $data['judul_acara'] ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <div class="form-group">
                <label class="text-black font-weight-bold" for="judul_acara">Judul Acara</label>
                <input type="text" id="judul_acara" name="judul_acara" class="form-control"
                  placeholder="Judul acara yang diselenggarakan" value="<?= $data['judul_acara'] ?>" />
              </div>
              <div class="form-group">
                <label class="text-black font-weight-bold" for="instansi">Instansi / Organisasi</label>
                <input type="text" id="instansi" name="instansi" class="form-control"
                  placeholder="Nama instansi / organisasi" value="<?= $data['instansi'] ?>" />
              </div>
              <div class="form-group">
                <label class="text-black font-weight-bold" for="penanggung_jawab">Penanggung Jawab</label>
                <input type="text" id="penanggung_jawab" name="penanggung_jawab" class="form-control text-capitalize"
                  placeholder="Penanggung Jawab" value="<?= $data['penanggung_jawab'] ?>" />
              </div>
              <div class="form-group">
                <label class="text-black font-weight-bold" for="no_telp">Telepon</label>
                <input type="number" id="no_telp" name="no_telp" class="form-control " placeholder="Nomor telepon"
                  value="<?= $data['no_telp'] ?>" />
              </div>
              <div class="form-group">
                <label class="text-black font-weight-bold" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control " placeholder="Email"
                  value="<?= $data['email'] ?>" />
              </div>
              <div class="form-group">
                <label class="text-black font-weight-bold" for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control"
                  value="<?= $data['tanggal_mulai'] ?>">
              </div>
              <div class="form-group">
                <label class="text-black font-weight-bold" for="tanggal_akhir">Tanggal Akhir</label>
                <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control"
                  value="<?= $data['tanggal_akhir'] ?>">
              </div>
              <div class="form-group">
                <label for="jumlah_orang" class="font-weight-bold text-black">Jumlah Orang</label>
                <input type="number" name="jumlah_orang" id="jumlah_orang" class="form-control"
                  placeholder="Jumlah orang" value="<?= $data['jumlah_orang'] ?>">
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Status Penyewaan</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="status">Status</label>
                  </div>
                  <select class="custom-select" name="status" id="status">
                    <option value="Menunggu" <?= $data['status'] == 'Menunggu' ? 'selected' : null ?>>Menunggu
                    </option>
                    <option value="Disetujui" <?= $data['status'] == 'Disetujui' ? 'selected' : null ?>>Disetujui
                    </option>
                    <option value="Ditolak" <?= $data['status'] == 'Ditolak' ? 'selected' : null ?>>Ditolak</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="text-black font-weight-bold" for="message">Surat Balasan</label>
                <textarea name="pesan_balasan" id="message" class="form-control " cols="30" rows="8"
                  placeholder="Balasan penyewaan gedung"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
            <button type="submit" name="balasan" class="btn btn-primary">Kirim balasan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</form>
<?php } ?>
<!-- Modal Balasan-->