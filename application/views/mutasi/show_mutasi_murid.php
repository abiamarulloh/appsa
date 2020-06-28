<?php if($this->session->userdata("date_graduation")) : ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="text-center">Data Mutasi angkatan <?= $date_graduation['date_graduation'] . " </br>  " . $date_graduation['name_graduation'];  ?></h1>

                        <!-- Kembali ke mutasi/list_mutasi -->
                        <a href="<?= base_url("mutasi/list_mutasi"); ?>" class="btn btn-primary"> <i class="fas fa-arrow-left"></i>  kembali ke list mutasi</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="dataTable"  width="100%">
                                <thead class="bg-primary text-white text-center">
                                    <tr>
                                        <th class="d-css-none">No</th>
                                        <th class="d-css-none">Nis</th>
                                        <th>Nama Lengkap</th>
                                        <th class="d-css-none">Kelas</th>
                                        <th class="d-css-none">Jurusan</th>
                                        <th class="d-css-none">Jk</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>

                                <?php $no = 1; ?>
                                <tbody>
                                    <?php foreach($getMuridKelasJurusan as $gmKJ):  ?>
                                        <?php foreach($getDataPrestasi as $gDPk):  ?>
                                            <?php if($gmKJ['nisn_id'] == $gDPk['nisn_id']): ?>
                                                    
                                                <!-- Mengecek apakah kelas 4 tersedia atau tidak jika ada maka jangan tampilkan sehingga hanya menampilkan x,xi,xii -->
                                                <?php if($gmKJ['kelas_murid'] == 4) : ?>
                                                    
                                                    <!-- Menampilkan data berdasarkan tahun angkatannya masing masing -->
                                                    <?php if($gmKJ['date_graduation'] == $date_graduation['date_graduation']) : ?>

                                                        <tr>
                                                            <th class="d-css-none">
                                                                <?=
                                                                    $no++;
                                                                ?>
                                                            </th>
                                                            <td class="d-css-none"><?= $gmKJ['nisn_id']; ?></td>
                                                            <td>
                                                                <?= $gmKJ['nama']; ?> <br>
                                                            
                                                            </td>
                                                            <td class="d-css-none">
                                                                ALUMNI (LULUS)
                                                            </td>
                                                            <td class="d-css-none">
                                                                <?php foreach($jurusanAll as $jurusan) : ?>
                                                                    <?php if($gmKJ['jurusan'] ==  $jurusan['kode_jurusan']): ?>
                                                                        <?= $jurusan['singkatan_jurusan']; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </td>
                                                            <td class="d-css-none">
                                                                <?php if($gmKJ['jk'] == 0): ?>
                                                                P
                                                                <?php elseif($gmKJ['jk'] == 1): ?>
                                                                L
                                                                <?php endif; ?>
                                                            </td>
                                                                
                                             

                                                            <td>
                                                    
                                                                <a href="<?= base_url('mutasi/option_detail_murid/') . $gmKJ['nisn_id']; ?>" class="badge badge-success"><i class="fas fa-info-circle"></i> Detail</a> 
                                                        
                                                            </td>

                                                        </tr>

                                                    <?php endif; ?>
                                                <?php endif;  ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th class="d-css-none">No</th>
                                        <th class="d-css-none">Nis</th>
                                        <th>Nama Lengkap</th>
                                        <th class="d-css-none">Kelas</th>
                                        <th class="d-css-none">Jurusan</th>
                                        <th class="d-css-none">Jk</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <?= redirect("mutasi"); ?>
<?php  endif; ?>