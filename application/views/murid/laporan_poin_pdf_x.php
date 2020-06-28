<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- favicon buatan -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/favicon/smk.jpg" type="image/x-icon">
    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?= base_url(); ?>/assets/sbadmin2/css/style.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>/assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?= base_url(); ?>/assets/MDB-Free/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?= base_url(); ?>/assets/MDB-Free/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/datepicker/css/bootstrap-datepicker3.min.css" />

    <title>Laporan Poin Pelanggaran <?= $getMuridKelasJurusanById['nama']; ?></title>
</head>

<body class="text-dark">

    <div class="table-responsive">
        <table class="table">
            <?php if($this->session->flashdata('flash2')): ?>
            <?= $this->session->flashdata('flash2'); ?>
            <?php endif; ?>

            <!-- Detail Murid -->
            <thead>
                <tr>
                    <th colspan="4" class=" p-1 border-0">
                        <h6 class="text-center font-weight-bolder text-left text-uppercase" style="font-size:14px">
                            Laporan Poin Pelanggaran
                        </h6>
                    </th>
                </tr>
                <tr>
                    <th colspan="4" class="p-1 border-0">
                        <h6 class="font-weight-bolder text-left text-uppercase" style="font-size:11px">
                            Detail Murid
                        </h6>
                    </th>
                </tr>
                <tr>
                    <th class="p-1 border-bottom-0 text-center font-weight-bold" style="font-size:10px">Nis</th>
                    <th class="p-1 border-bottom-0 text-center font-weight-bold" style="font-size:10px">Nama Lengkap
                    </th>
                    <th class="p-1 border-bottom-0 text-center font-weight-bold" style="font-size:10px">Kelas</th>
                    <th class="p-1 border-bottom-0 text-center font-weight-bold" style="font-size:10px">Jurusan</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="p-0 text-center" style="font-size:10px; ">
                        <?= $getMuridKelasJurusanById['nisn_id'];  ?>
                    </td>
                    <td class="p-0 text-center" style="font-size:10px; ">
                        <?= $getMuridKelasJurusanById['nama'];  ?>
                    </td>
                    <td class="p-0 text-center" style="font-size:10px; ">
                        X
                    </td>
                    <td class="p-0 text-center" style="font-size:10px; ">
                        <?php foreach($jurusanAll as $jurusan) : ?>
                        <?php if($jurusan['kode_jurusan'] == $getMuridKelasJurusanById['jurusan'] ) : ?>
                        <?= $jurusan['singkatan_jurusan']; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </td>

                </tr>
            </tbody>
        </table>



        <!-- Detail Pelanggaran -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th colspan="4" class="p-1 border-0">
                        <h6 class="font-weight-bolder text-left text-uppercase" style="font-size:11px">
                            Detail Pelanggaran
                        </h6>
                    </th>
                </tr>
                <tr>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">
                        Pelanggaran
                    </td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">
                        Pasal
                    </td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">
                        Poin
                    </td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">
                        Tanggal Kejadian
                    </td>
                </tr>
            </thead>

            <tbody>

                <?php $total_poin = 0; ?>
                <?php $total_pelanggaran = 0; ?>
                <?php foreach( $getMuridKelasJurusanByIdPoin as $gmkjbi): ?>
                <?php if( $gmkjbi['kelas_poin'] == 1) : ?>

                <tr>
                    <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px;">
                        <?php if($gmkjbi['pelanggaran']) : ?>
                        <?= $gmkjbi['pelanggaran'];  ?>
                        <?php else : ?>
                        <span class="font-weight-bold">-</span>
                        <?php  endif; ?>
                    </td>

                    <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px;">
                        <?php if($gmkjbi['pasal']) : ?>
                        <?= $gmkjbi['pasal'];  ?>
                        <?php else : ?>
                        <span class="font-weight-bold">-</span>
                        <?php  endif; ?>
                    </td>
                    <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px;">
                        <?php if($gmkjbi['jumlah_poin']) : ?>
                        <?= $gmkjbi['jumlah_poin'];  ?>
                        <?php else : ?>
                        <span class="font-weight-bold">-</span>
                        <?php  endif; ?>
                    </td>
                    <td class="p-0 border-bottom-0 border-top-0" style="font-size:10px;">

                        <?php 
                                        if( $gmkjbi['date'] != NULL) : 
                                            $bulan  =  date("M", strtotime($gmkjbi['date']));
                                
                                                if( $bulan == "Jan"){
                                                    $bulan = "Januari";
                                                }elseif($bulan == "Feb"){
                                                    $bulan = "Februari";
                                                }elseif($bulan == "Mar"){
                                                    $bulan = "Maret";
                                                }elseif($bulan == "Apr"){
                                                    $bulan = "April";
                                                }elseif($bulan == "May"){
                                                    $bulan = "Mei";
                                                }elseif($bulan == "Jun"){
                                                    $bulan = "Juni";
                                                }elseif($bulan == "Jul"){
                                                    $bulan = "Juli";
                                                }elseif($bulan == "Aug"){
                                                    $bulan = "Agustus";
                                                }elseif($bulan == "Sep"){
                                                    $bulan = "September";
                                                }elseif($bulan == "Oct"){
                                                    $bulan = "Oktober";
                                                }elseif($bulan == "Nov"){
                                                    $bulan = "November";
                                                }elseif($bulan == "Dec"){
                                                    $bulan = "Desember";
                                                }
                                            
                                        
                                        echo date("d", strtotime($gmkjbi['date'])). " " . $bulan . " " . date("Y", strtotime($gmkjbi['date'])) ;
                                ?>


                        <?php else : ?>
                        <li class="fas fa-minus"></li>
                        <?php endif; ?>

                    </td>
                    <?php $total_poin = $total_poin + $gmkjbi['jumlah_poin']; ?>
                    <?php $total_pelanggaran += 1; ?>

                </tr>
                <?php endif; ?>
                <?php endforeach; ?>


                <tr>
                    <td colspan="4" class="p-0 text-center font-weight-bold" style="font-size:10px">Total Poin dan
                        Pelanggaran</td>
                </tr>
                <tr>
                    <td class="p-0 text-center font-weight-bold" style="font-size:10px">Total Poin Pelanggaran</td>
                    <td colspan="3" class="p-0 text-center" style="font-size:10px">
                        <?php if($total_poin) : ?>
                        <?= $total_poin; ?> Poin
                        <?php else: ?>
                        <span class="font-weight-bolder">-</span>
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <td class="p-0 text-center font-weight-bold border-top-0" style="font-size:10px">Total Pelanggaran
                    </td>
                    <td colspan="3" class="p-0 text-center border-top-0" style="font-size:10px">

                        <?php if($total_pelanggaran) : ?>

                        <?php
                                    echo $total_pelanggaran . " Pelanggaran";                     
                                ?>
                        <?php else: ?>
                        <span class="font-weight-bolder">-</span>
                        <?php endif; ?>

                    </td>
                </tr>
            </tbody>
        </table>


        <!-- Detail Prestasi -->
        <table class="table">
            <thead>
                <tr>
                    <th colspan="4" class="p-1 border-0">
                        <h6 class="font-weight-bolder text-left text-uppercase" style="font-size:11px">
                            Detail Prestasi
                        </h6>
                    </th>
                </tr>
                <tr>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">
                        Jenis Prestasi
                    </td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">
                        Detail Prestasi
                    </td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">
                        Poin
                    </td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">
                        Tanggal Kejadian
                    </td>
                </tr>
            </thead>

            <tbody>

                <?php $poin_prestasi = 0; ?>
                <?php $banyak_prestasi = 0; ?>

                <?php foreach( $poin_prestasi_by_id_poin_prestasi as $ppbipp): ?>
                <?php if($ppbipp['kelas_prestasi'] == 1) : ?>

                <tr>
                    <td class="p-0 border-top-0 border-bottom-0" style="font-size:10px">
                        <?php if($ppbipp['jenis_prestasi']) : ?>
                        <?= $ppbipp['jenis_prestasi'];  ?>
                        <?php else : ?>
                        <span class="font-weight-bold">-</span>
                        <?php endif; ?>
                    </td>

                    <td class="p-0 border-top-0 border-bottom-0" style="font-size:10px">
                        <?php if($ppbipp['sub_jenis_prestasi']) : ?>
                        <?= $ppbipp['sub_jenis_prestasi'];  ?>
                        <?php else : ?>
                        <span class="font-weight-bold">-</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-0 border-top-0 border-bottom-0" style="font-size:10px">
                        <?php if($ppbipp['poin']) : ?>
                        <?= $ppbipp['poin'];  ?>
                        <?php else : ?>
                        <span class="font-weight-bold">-</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-0 border-top-0 border-bottom-0" style="font-size:10px">

                        <?php 
                                    if( $ppbipp['date'] != NULL) : 
                                        $bulan  =  date("M", strtotime($ppbipp['date']));
                            
                                            if( $bulan == "Jan"){
                                                $bulan = "Januari";
                                            }elseif($bulan == "Feb"){
                                                $bulan = "Februari";
                                            }elseif($bulan == "Mar"){
                                                $bulan = "Maret";
                                            }elseif($bulan == "Apr"){
                                                $bulan = "April";
                                            }elseif($bulan == "May"){
                                                $bulan = "Mei";
                                            }elseif($bulan == "Jun"){
                                                $bulan = "Juni";
                                            }elseif($bulan == "Jul"){
                                                $bulan = "Juli";
                                            }elseif($bulan == "Aug"){
                                                $bulan = "Agustus";
                                            }elseif($bulan == "Sep"){
                                                $bulan = "September";
                                            }elseif($bulan == "Oct"){
                                                $bulan = "Oktober";
                                            }elseif($bulan == "Nov"){
                                                $bulan = "November";
                                            }elseif($bulan == "Dec"){
                                                $bulan = "Desember";
                                            }
                                        
                                    
                                    echo date("d", strtotime($ppbipp['date'])). " " . $bulan . " " . date("Y", strtotime($ppbipp['date'])) ;
                                
                            ?>

                        <?php else :  ?>
                        <span class="font-weight-bold">-</span>
                        <?php  endif; ?>

                    </td>

                    <?php $poin_prestasi = $poin_prestasi + $ppbipp['jumlah_poin_prestasi'];?>
                    <?php $banyak_prestasi +=  1 ?>

                </tr>
                <?php  endif; ?>
                <?php endforeach; ?>


                <tr>
                    <td colspan="4" class="p-0 text-center font-weight-bold" style="font-size:12px">
                        Total Poin dan Prestasi
                    </td>
                </tr>
                <tr>
                    <td class="p-0 text-center font-weight-bold" style="font-size:10px">Total Poin Prestasi</td>
                    <td colspan="3" class="p-0 text-center" style="font-size:10px">
                        <?php if($poin_prestasi) : ?>
                        <?= $poin_prestasi;  ?> Poin
                        <?php else : ?>
                        <span class="font-weight-bold">-</span>
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <td class="p-0 text-center font-weight-bold border-top-0" style="font-size:10px">Total Prestasi</td>
                    <td colspan="3" class="p-0 text-center border-top-0" style="font-size:10px">


                        <?php if($banyak_prestasi) : ?>

                        <?php
                                    echo $banyak_prestasi . " Prestasi";                     
                                ?>
                        <?php else: ?>
                        <span class="font-weight-bolder">-</span>
                        <?php endif; ?>

                    </td>
                </tr>
            </tbody>
        </table>

        <div class="container text-center font-weight-bold">
            <div class="row">
                <div class="col-12">
                    <h6 style="font-size:11px; text-decoration:underline;">
                        Rumus : Total Poin Pelanggaran - Total Poin Prestasi</h6>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-lg-6 text-left">
                    <h6 style="font-size:11px">
                        <?php if($total_poin|| $poin_prestasi): ?>
                        <?= $total_poin . " Poin Pelanggaran <span class='font-weight-bold'> - </span> " . $poin_prestasi . " Poin Prestasi"; ?>
                        <?php else : ?>
                        <span class="font-weight-bold">-</span>
                        <?php endif; ?>
                    </h6>
                </div>
                <div class="col-lg-1">
                    <h6 style="font-size:11px">|</h6>
                </div>
                <div class="col-lg-5 text-right">
                    <h6 style="font-size:11px">
                        <?php if($total_poin - $poin_prestasi >= 1) : ?>
                        <?= $total_poin - $poin_prestasi;  ?> Poin Pelanggaran
                        <?php elseif($total_poin - $poin_prestasi <= -1) : ?>
                        <?php $poin_rasional = $total_poin - $poin_prestasi;  ?>
                        <?= abs($poin_rasional);   ?> Poin Prestasi
                        <?php elseif(!$total_poin) : ?>
                        <span class="font-weight-bold">-</span>
                        <?php endif; ?>
                    </h6>
                </div>
            </div>
        </div>

        <table class="table" style="margin-top:-30px">
            <thead>
                <tr>
                    <td class="border-0 mb-4 font-weight-bolder ml-5">
                        <p style="font-size:12px;">
                            <small>Mengetahui, </small> <br>
                            <?= $laporan_pdf['description']; ?>
                        </p>
                    </td>

                    <td class="mb-4 text-center border-0"></td>
                    <td class="mb-4 text-center border-0"></td>

                    <td class="mb-4 text-center border-0 font-weight-bolder">
                        <p style="font-size:12px;"><br>
                            <?= $user['description']; ?>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td class="mb-4 ml-5 border-0">
                        <u>
                            <p style="font-size:11px;">
                                <u>
                                    <?= $laporan_pdf['nama']; ?>
                                </u>
                            </p>
                        </u></td>
                    <td class="mb-4 text-center border-0"></td>
                    <td class="mb-4 text-center border-0"></td>

                    <td class="mb-4 text-center border-0">
                        <p style="font-size:11px;">
                            <u> <?= $user['nama']; ?> </u>
                        </p>
                    </td>
                </tr>
            </thead>
        </table>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/assets/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/assets/sbadmin2/js/sb-admin-2.min.js"></script>

    <script src="<?= base_url(); ?>/assets/sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/assets/sbadmin2/js/demo/datatables-edit.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?= base_url(); ?>/assets/MDB-Free/js/mdb.min.js"></script>

    <script src="<?= base_url(); ?>/assets/datepicker/js/bootstrap-datepicker.min.js"></script>

</body>

</html>