<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Logika untuk menampilkan judul awal -->
    <?php if( $user['role_id'] == 1 ) : ?>
    <h4 class=" mb-2 text-gray-800 ml-2 text-uppercase"><i class="fas fa-user-plus"></i> Tambah Murid <?= $about_us['name_school']; ?> </h4>
    <?php else : ?>
    <h4 class=" mb-2 text-gray-800 ml-2 text-uppercase"><i class="fas fa-user-plus"></i> Tambah Murid Kelas
        " <?php if($user['kelas_id'] == 1): ?>
        X
        <?php elseif ($user['kelas_id'] == 2) : ?>
        XI
        <?php elseif($user['kelas_id'] == 3): ?>
        XII
        <?php endif; ?>

        <?php if($user['jurusan_id'] == 1): ?>
        TKJ
        <?php elseif ($user['jurusan_id'] == 2) : ?>
        AKL
        <?php elseif($user['jurusan_id'] == 3): ?>
        OTKP
        <?php endif; ?> "

    </h4>
    <?php endif; ?>
    <!-- Logika untuk menampilkan judul Akhir -->


    <!----------------------------------- Tabel Tambah data Murid awal  -------------------------------------------->
    <!-- DataTales Example -->

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="<?= base_url('assets/sbadmin2/img/murid.jpg') ?>" class="img-responsive img-thumbnail">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <p class="lead">Form Tambah Data murid</p>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url(); ?>/murid" method="post">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="nisn">Nisn </label>
                                        <input type="number" min="1" name="nisn" id="nisn" class="form-control"
                                            placeholder="Nisn">
                                        <?= form_error('nisn', '<small class="text-danger">' ,'</small>'); ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap </label>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                                        <?= form_error('nama', '<small class="text-danger">' ,'</small>'); ?>
                                    </div>
                                </td>

                                <!-- Jika User Hak Akses Penuh / Admin  -->
                                <?php if( $user['role_id'] == 1): ?>
                                <td>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select class="form-control" name="kelas" id="kelas">
                                            <option value="1">X</option>
                                            <option value="2">XI</option>
                                            <option value="3">XII</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="jurusan">jurusan</label>
                                        <select class="form-control" name="jurusan" id="jurusan">
                                            <?php foreach($jurusanAll as $jurusan) : ?>
                                            <?php if($jurusan['status'] == 0): ?>
                                            <option hidden disabled><?= $jurusan['singkatan_jurusan']; ?></option>
                                            <?php elseif($jurusan['status'] == 1) : ?>
                                            <option value="<?= $jurusan['kode_jurusan']; ?>">
                                                <?= $jurusan['singkatan_jurusan']; ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </td>

                                <!-- Jika Walikelas Maka Tampilkan data murid
                                sesuai kelas dan jurusan walikelas  -->
                                <?php else : ?>
                                <!-- Kelas  -->
                                <td width="120px">
                                    <div class="form-group">
                                        <label for="kelas">kelas</label>
                                        <select class="form-control" name="kelas" id="kelas">
                                            <?php if($user['kelas_id'] == 1): ?>
                                            <option value="1">X</option>
                                            <?php elseif ($user['kelas_id'] == 2) : ?>
                                            <option value="2">XI</option>
                                            <?php elseif($user['kelas_id'] == 3): ?>
                                            <option value="3">XII</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </td>

                                <!-- Jurusan -->
                                <td width="120px">
                                    <div class="form-group">
                                        <label for="jurusan">Jurusan</label>
                                        <select class="form-control" name="jurusan" id="jurusan">
                                            <?php foreach($jurusanAll as $jurusan) : ?>
                                            <?php if($user['jurusan_id'] ==  $jurusan['kode_jurusan']): ?>
                                            <option value="<?= $jurusan['kode_jurusan']; ?>">
                                                <?= $jurusan['singkatan_jurusan']; ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </td>
                                <?php endif; ?>

                                <td>
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select class="form-control" name="jk" id="jk">
                                            <option value="0">P</option>
                                            <option value="1">L</option>
                                        </select>
                                    </div>
                                </td>

                                <td>
                                    <button type="submit" name="addMurid" class="btn btn-primary btn-md">
                                        <i class="fas fa-user-plus"></i> Tambah Murid
                                    </button>
                                </td>
                            </tr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----------------------------------- Tabel Tambah data Murid Akhir  -------------------------------------------->



    <!--  Pemisah antara Tabel tambah dan tabel data Murid -->



    <!-- Judul Daftar Murid  -->
    <!--  Jika Admin   -->
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <?php if( $user['role_id'] == 1 ) : ?>
                <h4 class="text-gray-800 mb-2 text-uppercase"><i class="fas fa-book-open"></i> Daftar Murid <?= $about_us['name_school']; ?>
                </h4>
                <?php else : ?>
                <!-- Jika Walikelas -->
                <h4 class="text-gray-800 mb-2 text-uppercase"><i class="fas fa-book-open"></i> Daftar Murid Kelas
                    "
                    <?php if($user['kelas_id'] == 1): ?>
                    X
                    <?php elseif ($user['kelas_id'] == 2) : ?>
                    XI
                    <?php elseif($user['kelas_id'] == 3): ?>
                    XII
                    <?php endif; ?>

                    <?php foreach($jurusanAll as $jurusan) : ?>
                        <?php if($user['jurusan_id'] == $jurusan['kode_jurusan'] ): ?>
                            <?= $jurusan['singkatan_jurusan']; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    "
                </h4>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Tutup Judul Daftar Murid -->



    <!--------------------------  Bagian Data Murid  Awal ---------------------------------------->
    <!-- DataTales Example -->

    <!-- Update Kelas pada tbl_murid_poin dilakukan hanya sekali -->
    <!-- <a href="<?= base_url("murid/update_kelas"); ?>" class="btn btn-warning">Update Kelas</a> -->

    <div class="card p-0 m-0 mb-5">
        <div class="card-body">
            <div class="table-responsive  bg-white">
                <table class="table table-hover  table-bordered" id="dataTable" width="100%">
                    <?php if($this->session->flashdata('flash2')): ?>
                    <?= $this->session->flashdata('flash2'); ?>
                    <?php endif; ?>
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas & Jurusan</th>
                            <th>Jk</th>
                            <th>Info Poin</th>
                            <th>Hak Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($getMuridKelasJurusan as $gMKJ):  ?>
                        <?php foreach($getDataPrestasi as $gDP):  ?>
                        <?php if($gMKJ['nisn_id'] == $gDP['nisn_id']) : ?>
                        <tr>
                            <th>
                                <sup>
                                    Nomor:
                                </sup>
                                <br> <?= $no++;  ?>
                            </th>
                            <td>
                                <sup>
                                    NISN:
                                </sup>
                                <br> <?= $gMKJ['nisn_id']; ?>
                            </td>
                            <td>
                                <sup>
                                    Nama Lengkap :
                                </sup>
                                <br><?= $gMKJ['nama']; ?> <br>

                            </td>
                            <td>
                                <sup>
                                    Kelas & Jurusan :
                                </sup>
                                <br>
                                <?php if($gMKJ['kelas_murid'] == 1): ?>
                                X
                                <?php elseif ($gMKJ['kelas_murid'] == 2) : ?>
                                XI
                                <?php elseif($gMKJ['kelas_murid'] == 3): ?>
                                XII
                                <?php endif; ?>

                                <!-- Jurusan -->
                                <?php foreach($jurusanAll as $jurusan) : ?>
                                <?php if($gMKJ['jurusan'] ==  $jurusan['kode_jurusan']): ?>
                                <?= $jurusan['singkatan_jurusan']; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                        
                            <td>
                                <sup>
                                    Jenis Kelamin:
                                </sup>
                                <br>
                                <?php if($gMKJ['jk'] == 0): ?>
                                P
                                <?php elseif($gMKJ['jk'] == 1): ?>
                                L
                                <?php endif; ?>
                            </td>

                            <td>
                                <sup>
                                    Info Poin:
                                </sup>
                                <br>

                                <!-- Status Poin  -->
                                <!-- Poin Pelanggaran -->
                                <?php if($gMKJ['jumlah_poin']): ?>
                                <span class="badge badge-pill badge-danger p-1 m-0">
                                    <?= $gMKJ['jumlah_pelanggaran'] ?> Pelanggaran &
                                    <?= $gMKJ['jumlah_poin']; ?> Poin Pelanggaran
                                </span>
                                <?php else: ?>
                                <span class="badge badge-pill badge-light p-1 m-0">Tidak Memiliki Poin
                                    pelanggaran</span>
                                <?php endif; ?>


                                <!-- Poin Prestasi -->
                                <?php if($gDP['jumlah_poin_prestasi']): ?>
                                <span class="badge badge-pill  badge-primary p-1 m-0">
                                    <?= $gDP['jumlah_prestasi'] ?> Prestasi &

                                    <?= $gDP['jumlah_poin_prestasi']; ?>
                                    Poin Pelanggaran
                                </span>
                                <?php else: ?>
                                <span class="badge badge-pill  badge-light p-1 m-0">Tidak Memiliki Poin
                                    Prestasi</span>
                                <?php endif; ?>


                                <!-- Kalkulasi Poin Pelanggaran dan Poin Prestasi -->
                                <?php if($gMKJ['jumlah_poin'] - $gDP['jumlah_poin_prestasi'] >= 1 ): ?>
                                <span class="badge badge-pill badge-success p-1 m-0">
                                    <?= $gMKJ['jumlah_poin']  - $gDP['jumlah_poin_prestasi']; ?>
                                    Poin Pelanggaran
                                </span>

                                <?php elseif ($gMKJ['jumlah_poin'] - $gDP['jumlah_poin_prestasi'] <= -1) : ?>
                                <span class="badge badge-pill badge-success p-1 m-0">
                                    <?php $rasional =  $gMKJ['jumlah_poin']  - $gDP['jumlah_poin_prestasi']; ?>
                                    <?= abs($rasional);   ?> Poin Prestasi
                                </span>
                                <?php elseif ($gMKJ['jumlah_poin']) : ?>
                                <!-- Cek apakah ada pelanggaran, jika ada tampilkan ini -->
                                <?php if($gMKJ['jumlah_poin'] - $gDP['jumlah_poin_prestasi'] == 0 ): ?>
                                <span class="badge badge-pill  badge-success p-1 m-0">
                                    0 Poin Pelanggaran
                                </span>
                                <?php endif; ?>
                                <?php endif; ?>



                            </td>

                            <td>
                                <sup>
                                    Hak Akses:
                                </sup>
                                <br>
                                <a href="<?= base_url('murid/option_detail_murid/') . $gMKJ['nisn_id']; ?>"
                                    class="badge p-1 m-1 badge-success"><i class="fas fa-info-circle"></i>
                                    Detail</a>

                                <a href="<?= base_url('murid/beri_poin_murid/')  . $gMKJ['nisn_id']; ?>"
                                    class="badge p-1 m-1 badge-info"><i class="fas fa-balance-scale"></i>
                                    Beri Poin
                                    Pelanggaran</a>
                                <a href="<?= base_url('murid/beri_poin_prestasi_murid/')  . $gMKJ['nisn_id']; ?>"
                                    class="badge p-1 m-1 badge-secondary"><i class="fas fa-trophy"></i> Beri
                                    Poin Prestasi</a>

                                <a href="<?= base_url('murid/laporan_poin_pdf_x/') . $gMKJ['nisn_id'] ; ?>"
                                    target="_blank" class="badge p-1 m-1 badge-primary"><i
                                        class="fas fa-fw fa-file-export"></i>
                                    Export PDF "X"</a>

                                <a href="<?= base_url('murid/laporan_poin_pdf_xi/') . $gMKJ['nisn_id'] ; ?>"
                                    target="_blank" class="badge p-1 m-1 badge-primary"><i
                                        class="fas fa-fw fa-file-export"></i>
                                    Export PDF "XI"</a>

                                <a href="<?= base_url('murid/laporan_poin_pdf_xii/') . $gMKJ['nisn_id'] ; ?>"
                                    target="_blank" class="badge p-1 badge-primary m-1"><i
                                        class="fas fa-fw fa-file-export"></i>
                                    Export PDF "XII"</a>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas & Jurusan</th>
                            <th>Jk</th>
                            <th>Info Poin</th>
                            <th>Hak Akses</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


        <!--------------------------  Bagian Data Murid  Akhir ---------------------------------------->