<div class="container my-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5>Tambah Tahun Kelulusan Murid</h5>
                    <small class="bg-primary text-white">
                        Catatan : Tambah tahun kelulusan agar kamu bisa memutasi murid.
                    </small>
                    <hr>
                    <br>
                    <?= $this->session->flashdata("info-mutasi"); ?>

                    <form action="" method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="name_graduation">Nama Kelulusan</label>
                            <input type="text" name="name_graduation" class="form-control mb-2" id="name_graduation">
                            <?= form_error("name_graduation", "<small class='badge badge-danger text-wrap'>" , "</small>"); ?>
                        </div>

                        <div class="form-group">
                            <label for="add_date_graduation">Tambah Tahun Kelulusan</label>
                            <input placeholder="Selected date" type="date" autocomplete="off" name="date_graduation" class="form-control mb-2 datepicker">
                            <?= form_error("date_graduation", "<small class='badge badge-danger text-wrap'>" , "</small>"); ?>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Lanjutkan</button>
                        <a href="<?= base_url("mutasi/action_mutasi") ?>" class="btn btn-outline-secondary btn-block">Kembali</a>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>

