

<div class="container my-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Masukkan Security Mutasi</h3>
                    <hr>
                    <?= $this->session->flashdata("info-mutasi"); ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="password">Security Mutasi</label>
                            <input type="password" name="password" class="form-control mb-2" id="password">
                            <?= form_error("password", '<small class="badge badge-danger text-wrap">' , '</small>'); ?>
                        </div>

                        <!-- <div class="clearfix"></div> -->

                        <button type="submit" class="btn btn-primary btn-block mb-2">Lanjutkan</button>
                        
                        <a href="<?= base_url("mutasi"); ?>" class="btn btn-block btn-outline-secondary">Kembali</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>