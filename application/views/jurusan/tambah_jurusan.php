<div class="container">
    <div class="row">
        <div class="col-md-6">
           <div class="card">
               <div class="card-body">
               <h4><i class="fab fa-fw fa-black-tie"></i> Tambah Jurusan <?= $about_us['name_school']; ?></h4>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="kodeJurusan">Kode Jurusan</label>
                        <input type="text" name="kodeJurusan" class="form-control" id="kodeJurusan" >
                        <?= form_error('kodeJurusan', '<small class="text-danger">' ,'</small>'); ?>                
                    </div>
                    <div class="form-group">
                        <label for="singkatanJurusan">Singkatan Jurusan</label>
                        <input type="text" name="singkatanJurusan" class="form-control" id="kodeJurusan" >
                        <?= form_error('singkatanJurusan', '<small class="text-danger">' ,'</small>'); ?>                
                    </div>
                    <div class="form-group">
                        <label for="NamaJurusan">Nama Jurusan</label>
                        <input type="text" name="namaJurusan" class="form-control" id="NamaJurusan">
                        <?= form_error('namaJurusan', '<small class="text-danger">' ,'</small>'); ?>
                    </div>

                    <!-- Kembali / back -->
                    <a href="<?= base_url("jurusan"); ?>" class="btn btn-success"> <i class="fas fa-arrow-left"></i> </a>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-success btn">Tambah</button>
                </form>
               </div>
           </div>
        </div>
    </div>
</div>