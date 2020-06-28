
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
              
            <div class="card m-3 shadow-sm mb-4" id="detailMurid">
                <div class="card-header py-3">
                 
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="text-center font-weight-bolder">Pilihan Detail Haid <br> Kelas X, XI, XII</h5>

                            <hr>
                            
                            <!-- Jika murid Kelas x, hanya membedakan button -->
                            <?php if($getSiswiById['kelasMurid'] == 1) : ?>
                                <a href="<?= base_url("mutasi/detail_haid_x/") . $getSiswiById['nisn_id'];  ?>" class="btn btn-primary mb-2 btn-block">Data Kelas X</a>
                            <?php else : ?>
                                <a href="<?= base_url("mutasi/detail_haid_x/") . $getSiswiById['nisn_id'];  ?>" class="btn btn-light mb-2 btn-block">Data Kelas X</a>
                            <?php endif; ?>
                            

                            <!-- Jika murid Kelas xi, hanya membedakan button -->
                            <?php if($getSiswiById['kelasMurid'] == 2) : ?>
                                <a href="<?= base_url("mutasi/detail_haid_xi/") . $getSiswiById['nisn_id'];  ?>" class="btn btn-primary mb-2 btn-block">Data Kelas XI</a>
                            <?php else : ?>
                                <a href="<?= base_url("mutasi/detail_haid_xi/") . $getSiswiById['nisn_id'];  ?>" class="btn btn-light mb-2 btn-block">Data Kelas XI</a>
                            <?php endif; ?>


                            <!-- Jika murid Kelas xii, hanya membedakan button -->
                            <?php if($getSiswiById['kelasMurid'] == 3) : ?>
                                <a href="<?= base_url("mutasi/detail_haid_xii/") . $getSiswiById['nisn_id'];  ?>" class="btn btn-primary mb-2 btn-block">Data Kelas XII</a>
                            <?php else : ?>
                                <a href="<?= base_url("mutasi/detail_haid_xii/") . $getSiswiById['nisn_id'];  ?>" class="btn btn-light mb-2 btn-block">Data Kelas XII</a>
                            <?php endif; ?>
                            <br>

                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('mutasi'); ?>"  class="btn btn-primary btn-sm text-white btn-block"><i class="fas fa-arrow-circle-left"></i> Kembali</a> 
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>