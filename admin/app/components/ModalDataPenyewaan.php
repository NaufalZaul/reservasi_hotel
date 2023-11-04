<?php
include "app/config/koneksi.php";
$query_penyewaan = mysqli_query($conn, "SELECT * FROM penyewaan");
$query_penyewa = mysqli_query($conn, "SELECT * FROM penyewa ORDER BY nama_lengkap ASC");

$arr_data_email = array();
$arr_data_pj = array();
$arr_data_instansi = array();
foreach ($query_penyewaan as $dt) {
  array_push($arr_data_email, $dt['email']);
  array_push($arr_data_pj, $dt['penanggung_jawab']);
  array_push($arr_data_instansi, $dt['instansi']);
}
$uniqueItemsEmail = array_unique($arr_data_email);
$uniqueItemsPJ = array_unique($arr_data_pj);
$uniqueItemsInstansi = array_unique($arr_data_instansi);
?>

<!-- <?php foreach ($query_penyewaan as $data) { ?> -->
<form action="app/controller/DataPenyewaan.php" method="POST">

  <!-- <?php } ?> -->

  <!-- Modal Balasan-->
  <div class="modal fade" id="modal-balasan">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Balasan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="font-weight-bold" for="email">Email</label>
            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header p-1" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                      data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Pilih beberapa email untuk surat balasan
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <ul class="list-group rounded-0">
                    <li class="list-group-item d-flex row border-0">
                      <div class="col-1"></div>
                      <label class="col-4 mb-0">Email</label>
                      <label class="col-3 mb-0">Penanggung Jawab</label>
                      <label class="col-4 mb-0">Instansi</label>
                    </li>
                    <div class="dropdown-divider my-0"></div>

                    <?php foreach ($uniqueItemsEmail as $key => $email) { ?>
                    <li class="list-group-item d-flex row align-items-center border-0">
                      <span class="col-1">
                        <input type="checkbox" name="email[]" class="mr-2" id="<?= $email ?>" value="<?= $email ?>">
                      </span>
                      <span class="col-4">
                        <label for="<?= $email ?>" class="m-0 font-weight-normal"><?= $email ?></label>
                      </span>
                      <span class="col-3">
                        <label for="<?= $email ?>" class="m-0 font-weight-normal"><?= $uniqueItemsPJ[$key] ?></label>
                      </span>
                      <span class="col-4">
                        <label for="<?= $email ?>"
                          class="m-0 font-weight-normal"><?= $uniqueItemsInstansi[$key] ?></label>
                      </span>
                    </li>
                    <?php if ($email != end($uniqueItemsEmail)) { ?>
                    <div class="dropdown-divider my-0"></div>
                    <?php }
                    } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Status Penyewaan</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="status">Status</label>
              </div>
              <select class="custom-select" name="status" id="status">
                <option value="Menunggu">Menunggu
                </option>
                <option value="Disetujui">Disetujui
                </option>
                <option value="Ditolak">Ditolak</option>
              </select>
            </div>
          </div>
          <div class="form-group d-flex flex-column">
            <label class="font-weight-bold" for="feedback">Feedback</label>
            <textarea class="form-control" name="feedback" id="feedback" cols="30" rows="7"
              placeholder="Tulis alasan yang sesuai dari status pernyataan"></textarea>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="balasan" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
    <!-- Modal Balasan-->
</form>