<div class="container my-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center font-weight-bolder">MUTASI MURID</h4>
                    <small>
                        Catatan : <br>
                        <ul>
                            <li>Kelas X akan naik ke kelas XI</li>
                            <li>Kelas XI akan naik ke kelas XII</li>
                            <li>Kelas XII akan masuk ke dalam list <br> <small class="bg-primary text-white p-1">"DAFTAR MURID LULUS SEMUA ANGKATAN"</small></li>
                        </ul>
                    </small>
                    <hr>

                    <?= $this->session->flashdata("info-mutasi") ?>
                    <a href="<?= base_url('mutasi/mutasi_security'); ?>" class="btn btn-primary btn-block mb-2" onclik="return prompt()">Mutasi Semua Murid Saat Ini</a>

                    <a href="<?= base_url('mutasi/list_mutasi'); ?>" class="btn btn-primary btn-block mb-2">Daftar Murid "Lulus"  </a>

                    <a href="<?= base_url('mutasi/list_mutasi_haid'); ?>" class="btn btn-primary btn-block mb-2">Daftar Murid "Haid"  </a>

                    <a href="<?= base_url('mutasi/hapus_daftar_mutasi'); ?>" class="btn btn-danger btn-block mb-2">Hapus Daftar Murid  </a>
                    
                </div>
            </div>
        </div>
    </div>
</div>