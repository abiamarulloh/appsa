<?php if($this->session->userdata("pw_post")) : ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Judul Daftar Murid  -->
    <!--  Jika Admin   -->
    <h4 class="text-gray-800 mb-2 text-uppercase"><i class="fas fa-book-open"></i> Daftar Murid yang akan di Mutasi <?= $about_us['name_school']; ?> </h4>

    <!--------------------------  Bagian Data Murid  Awal ---------------------------------------->
    <!-- DataTales Example -->
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Murid <?= $about_us['name_school']; ?></h6>

       
            <hr>

            <div class="card">
                <div class="card-body bg-primary text-white">
                    <a href="<?= base_url("mutasi/add_date_graduation"); ?>" class="btn btn-light">Tambah Tahun kelulusan </a>
                    <br>
                    <small>
                        Catatan : 
                        <ul>
                            <li>Beri tahun angkatan jika ingin memutasi murid</li>
                            <li>Fungsi Mutasi murid tidak akan berjalan jika belum diberi tahun angkatan</li>
                        </ul>
                    </small>
                </div>
            </div>

            <hr>
            <div class="card">
                <div class="card-body bg-primary text-white">
                    <p class="lead">Info Angkatan yang akan lulus</p>
                    <ul>
                        <li>Nama Kelulusan   : 
                            <?php if($this->session->userdata("name_graduation")) : ?>
                                <?= $this->session->userdata("name_graduation"); ?>
                            <?php else : ?>
                                <small class="bg-light text-dark">Harap beri nama Kelulusan terlebih dahulu</small>
                            <?php endif; ?>

                        </li>
                        <li>Tahun Kelulusan   : 
                            <?php if($this->session->userdata("date_graduation")) : ?>
                                <?= $this->session->userdata("date_graduation"); ?>
                            <?php else : ?>
                                <small class="bg-light text-dark">Harap beri tahun Kelulusan terlebih dahulu</small>
                            <?php endif; ?>

                        </li>
                    </ul>                    
                </div>
            </div>

            <hr>
            <!-- Check ALL -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" id="checkAll" class="float-right">
                    </div> 
                <span class="ml-2 bg-primary text-white p-2"> Pilih Semua Murid Untuk lakukan Mutasi </span>
                </div>
            </div>


        </div>
        <div class="card-body">
            <?= $this->session->flashdata("info-mutasi"); ?>
            <!-- Mutasi CheckItem -->
            <form action="" method="post">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="mutasi"  width="100%">
                        <thead class="bg-primary text-white text-center">
                            <tr>
                                <th class="d-css-none">No</th>
                                <th class="d-css-none">Nis</th>
                                <th>Nama Lengkap</th>
                                <th class="d-css-none">Kelas</th>
                                <th class="d-css-none">Jurusan</th>
                                <th>Tahun Lulus</th>
                                <th>Check Item</th>
                            </tr>
                        </thead>

                        <?php $no = 1; ?>
                        <tbody>
                            <?php foreach($getMuridKelasJurusan as $gmKJ):  ?>
                                <?php foreach($getDataPrestasi as $gDPk):  ?>
                                    <?php if($gmKJ['nisn_id'] == $gDPk['nisn_id']): ?>
                                        <?php if($gmKJ['kelas'] != 4) : ?>
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
                                                    <?php if($gmKJ['kelas_murid'] == 1): ?>
                                                    X
                                                    <?php elseif ($gmKJ['kelas_murid'] == 2) : ?>
                                                    XI
                                                    <?php elseif($gmKJ['kelas_murid'] == 3): ?>
                                                    XII
                                                    <?php endif; ?>
                                                </td>
                                                <td class="d-css-none">
                                                    <?php foreach($jurusanAll as $jurusan) : ?>
                                                        <?php if($gmKJ['jurusan'] ==  $jurusan['kode_jurusan']): ?>
                                                            <?= $jurusan['singkatan_jurusan']; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>

                                                <!-- Tahun Lulus -->
                                                <td>
                                                    <?php if($gmKJ['kelas_murid'] == 3) :  ?>
                                                        <input type="text" readonly name="date_graduation" class="border-0" value="<?= $this->session->userdata("date_graduation"); ?>">
                                                    <?php endif; ?>
                                                </td>
                                            
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" value="<?= $gmKJ['nisn_id'] ?>" name="checkItem[]" class="checkItem">
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                                </td>

                                            </tr>
                                        <?php endif; ?>
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
                                <th></th>
                                <th>Check Item</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <br>
                <button type="submit" class="btn btn-block btn-primary" onclick="return confirm('Apakah anda yakin ingin Melanjutkan Mutasi ini ? ')">Mutasi Seluruh Murid </button>
                <a href="<?= base_url("mutasi/logout_mutasi") ?>" class="btn btn-outline-secondary btn-block">Kembali</a>
            </form>    

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!--------------------------  Bagian Data Murid  Akhir ---------------------------------------->
<?php else : ?>
    <?php redirect("mutasi"); ?>
<?php endif; ?>