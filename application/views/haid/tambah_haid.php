<div class="container">
    <div class="row">
        <div class="col-md-4 mt-5 mx-auto">
            <h5 class="text-center">Tambah Data Tanggal Haid  <br> <b><?= $getSiswiById['nama']; ?></b></h5>
            <hr>
            <form action="" method="post">

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" hidden value="<?= $getSiswiById['kelasMurid']; ?>" name="kelasUpdate" >
                        <input type="text" name="nisn_tbl_murid" hidden value="<?= $getSiswiById['nisn_id']; ?>">
                        <div class="form-group">
                            <label for="tanggalHaid">Tanggal Haid</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggalHaid" placeholder="Tanggal haid">
                            <?= form_error('tanggal', '<small class="text-danger">' ,'</small>'); ?>                
                        </div>
                        <div class="form-group">
                            <label for="tanggalHaid">Hari Ke- </label>
                            <input type="text" name="harike" class="form-control" id="tanggalHaid" placeholder="Hari Ke- ">
                            <?= form_error('harike', '<small class="text-danger">' ,'</small>'); ?>                
                        </div>

                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <select class="form-control" name="waktu" id="waktu">
                                <option value="1">Pagi</option>
                                <option value="0">Siang</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info btn-block"> <i class="fas fa-plus fa-fw"></i> Tambah Tanggal Haid</button>
                        <br> <br>
                        <a href="<?= base_url('haid'); ?>"  class="btn btn-secondary btn-md text-white"><i class="fas fa-arrow-circle-left"></i> Kembali ke data haid</a>  
                        <br><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>