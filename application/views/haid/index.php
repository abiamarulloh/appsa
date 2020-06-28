<div class="container my-5">
    <div class="row">
        <div class="col-md-12 mb-4">
            <img src="<?= base_url('assets/sbadmin2/img/girls.jpg') ?>" class="img-responsive img-thumbnail">
        </div>
    </div>
</div>

<h4 class=" mb-2 text-gray-800 ml-5 m-4 text-uppercase"><i class="fab fa-canadian-maple-leaf"></i> Daftar Absensi Haid
    <?= $about_us['name_school']; ?> </h4>


<!--------------------  Daftar Poin Pelanggaran awal -------------------------->
<div class="card m-4 shadow-sm p-3 mb-5 bg-white rounded mt-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Absensi Haid Siswi</h6>
        <!-- Jalankan update kelas haid -->
        <!-- <a href="<?= base_url("haid/updateKelas"); ?>" class="btn btn-danger">Update Kelas</a> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="dataTable" width="100%">
                <?php if($this->session->flashdata('flash2')): ?>
                <?= $this->session->flashdata('flash2'); ?>
                <?php endif; ?>
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col" class="d-css-none">No</th>
                        <th scope="col" class="d-css-none">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col" class="d-css-none">Kelas & Jurusan</th>
                        <th scope="col" class="d-css-none">Jk</th>
                        <?php 
                        $bulan  =  date("M", time());
                         if( $bulan == "Jan"){
                            $namaBulan = "Januari";
                        }elseif($bulan == "Feb"){
                            $namaBulan = "Februari";
                        }elseif($bulan == "Mar"){
                            $namaBulan = "Maret";
                        }elseif($bulan == "Apr"){
                            $namaBulan = "April";
                        }elseif($bulan == "May"){
                            $namaBulan = "May";
                        }elseif($bulan == "June"){
                            $namaBulan = "Juni";
                        }elseif($bulan == "July"){
                            $namaBulan = "Juli";
                        }elseif($bulan == "Aug"){
                            $namaBulan = "Agustus";
                        }elseif($bulan == "Sept"){
                            $namaBulan = "September";
                        }elseif($bulan == "Oct"){
                            $namaBulan = "Oktober";
                        }elseif($bulan == "Nov"){
                            $namaBulan = "November";
                        }elseif($bulan == "Dec"){
                            $namaBulan = "Desember";
                        }

                    ?>
                        <th scope="col">Hak Akses</th>
                    </tr>
                </thead>

                <?php 
                    $no = 1; 
                ?>

                <tbody>
                    <?php $hari = 1; ?>
                    <?php foreach($getSiswiJoin as $gS):  ?>
                    <tr>
                        <th scope="row" class="d-css-none"><?= $no++; ?></th>
                        <td class="d-css-none">
                            <sup>
                                NISN:
                            </sup>
                            <br>
                            <?= $gS['nisn_id']; ?>
                        </td>
                        <td>
                            <sup>
                                Nama Lengkap:
                            </sup>
                            <br>
                            <?= $gS['nama']; ?>
                        </td>
                        <td class="d-css-none">
                            <sup>
                                Kelas & Jurusan:
                            </sup>
                            <br>
                            <?php if($gS['kelas_murid'] == 1): ?>
                            X
                            <?php elseif ($gS['kelas_murid'] == 2) : ?>
                            XI
                            <?php elseif($gS['kelas_murid'] == 3): ?>
                            XII
                            <?php endif; ?>

                            <!-- Jurusan -->
                            <?php foreach($jurusanAll as $jurusan) : ?>
                            <?php if($gS['jurusan'] ==  $jurusan['kode_jurusan']): ?>
                            <?= $jurusan['singkatan_jurusan']; ?>
                            <?php endif; ?>
                            <?php endforeach; ?>

                        </td>

                        <td class="d-css-none">
                            <sup>
                                Jenis Kelamin:
                            </sup>
                            <br>
                            <?php if($gS['jk'] == 0): ?>
                            P
                            <?php elseif($gS['jk'] == 1): ?>
                            L
                            <?php endif; ?>
                        </td>


                        <td>
                            <sup>
                                Hak Akses:
                            </sup>
                            <br>
                            <a href="<?= base_url('haid/option_detail_haid/') . $gS['nisn_id'] ; ?>"
                                class="badge badge-primary p-1"><i class="fas fa-info-circle"></i> Detail haid</a>

                            <a href="<?= base_url('haid/tambah_haid/') . $gS['nisn_id'] ; ?>"
                                class="badge badge-success btn-md"><i class="far fa-plus-square"></i> Tambah Tanggal
                                Haid</a>

                            <!-- Export data Haid dari kelas x ,XI, XII -->
                            <a href="<?= base_url('haid/laporan_haid_pdf_x/') . $gS['nisn_id'] ; ?>" target="_blank"
                                class="badge badge-danger p-1 btn-md"><i class="fas fa-fw fa-file-export"></i> Export to
                                PDF "X"</a>
                            <a href="<?= base_url('haid/laporan_haid_pdf_xi/') . $gS['nisn_id'] ; ?>" target="_blank"
                                class="badge badge-danger p-1 btn-md"><i class="fas fa-fw fa-file-export"></i> Export to
                                PDF "XI"</a>
                            <a href="<?= base_url('haid/laporan_haid_pdf_xii/') . $gS['nisn_id'] ; ?>" target="_blank"
                                class="badge badge-danger p-1 btn-md"><i class="fas fa-fw fa-file-export"></i> Export to
                                PDF "XII"</a>
                        </td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--------------------  Daftar haid  Akhir -------------------------->

<!-- Modal Box Tambah Data Haid -->
<!-- Button trigger modal -->