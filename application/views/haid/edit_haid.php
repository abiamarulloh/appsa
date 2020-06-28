<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <h5 class="text-center">Edit Data Bulan Haid  <br> <b><?= $getSiswiById['nama']; ?></b> </h5>
            <hr>
            <form action="" method="post">

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="nisn_tbl_murid" hidden value="<?= $getSiswiById['nisn_id']; ?>">
                        <div class="form-group">
                            <label for="tanggalHaid">Tanggal Haid</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggalHaid" value="<?= $getSiswiJoinById['tanggal']; ?>" placeholder="Tanggal haid">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info">Edit Tanggal Haid</button>
                        <a href="<?= base_url('wakesiswaan/absenhaid'); ?>" class="btn btn-primary"> <li class="fas fa-arrow-left"></li>  Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>