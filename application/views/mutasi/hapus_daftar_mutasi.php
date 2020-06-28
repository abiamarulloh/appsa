<div class="container my-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4>Pilih Tahun Kelulusan Murid</h4>
                    <small class="bg-danger text-white">
                        Catatan : Pilih tahun kelulusan murid untuk menghapus daftar murid beserta poinnya.
                    </small>
                    <hr>
                    <?= $this->session->flashdata("info-mutasi"); ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="date_graudation">Tahun Kelulusan</label>
                            <select class="form-control" id="date_graudation" name="date_graduation">
                                    <option value="0">Pilih Tahun kelulusan</option>
                                <?php foreach($date_graduation as $graduation) : ?>
                                    <option value="<?= $graduation['date_graduation']; ?>">
                                        <?= $graduation['name_graduation'] . " => "  .  $graduation['date_graduation']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" onclick="return confirm('Anda yakin ingin menghapus salah satu daftar murid yang sudah dimutasi  ?')" class="btn btn-primary btn-block">Hapus data Murid</button>
                        <a href="<?= base_url("mutasi") ?>" class="btn btn-outline-secondary btn-block">Kembali</a>

                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>

