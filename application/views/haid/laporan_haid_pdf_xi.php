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

    <title>Laporan Absensi Haid <?= $getMuridKelasJurusanById['nama']; ?></title>
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
                            Laporan Absensi Haid
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
                        XI
                    </td>
                    <td class="p-0 text-center" style="font-size:10px; ">
                        <?php if($getMuridKelasJurusanById['jurusan'] == 1): ?>
                        TKJ
                        <?php elseif ($getMuridKelasJurusanById['jurusan'] == 2) : ?>
                        AKL
                        <?php elseif($getMuridKelasJurusanById['jurusan'] == 3): ?>
                        OTKP
                        <?php endif; ?>
                    </td>

                </tr>
            </tbody>
        </table>


        <!-- data haid pagi -->
        <table class="table">
            <thead>
                <tr>
                    <td class="p-1 border-top-0 border-bottom-0 font-weight-bold">
                        <h6>Absen Pagi hari</h6>
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">Tanggal Haid</td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">Hari Ke- </td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">Waktu absen</td>
                </tr>
            </thead>

            <tbody class="text-center">
                <?php if($getSiswiJoin_pagi ) : ?>
                <?php foreach( $getSiswiJoin_pagi as $gsjp): ?>
                <?php if($gsjp['kelasHaid'] == 2) : ?>

                <tr>
                    <td class="p-0 border-bottom-0 border-top-0" style="font-size:9px">
                        <?php 
                                        if($gsjp['tanggal']) : 
                                        $bulan  =  date("m", strtotime($gsjp['tanggal']));
                            
                                        if( $bulan == "1"){
                                            $bulan = "Januari";
                                        }elseif($bulan == "2"){
                                            $bulan = "Februari";
                                        }elseif($bulan == "3"){
                                            $bulan = "Maret";
                                        }elseif($bulan == "4"){
                                            $bulan = "April";
                                        }elseif($bulan == "5"){
                                            $bulan = "May";
                                        }elseif($bulan == "6"){
                                            $bulan = "Juni";
                                        }elseif($bulan == "7"){
                                            $bulan = "Juli";
                                        }elseif($bulan == "8"){
                                            $bulan = "Agustus";
                                        }elseif($bulan == "9"){
                                            $bulan = "September";
                                        }elseif($bulan == "10"){
                                            $bulan = "Oktober";
                                        }elseif($bulan == "11"){
                                            $bulan = "November";
                                        }elseif($bulan == "12"){
                                            $bulan = "Desember";
                                        }
                                        
                                        echo date("d", strtotime($gsjp['tanggal'])). " " . $bulan . " " . date("Y", strtotime($gsjp['tanggal'])) ;
                                    
                                    endif ;
                                ?>



                    </td>
                    <td class="p-0 border-bottom-0 border-top-0" style="font-size:9px">
                        Hari Ke- <?= $gsjp['harike']; ?>
                    </td>
                    <td class="p-0 border-bottom-0 border-top-0" style="font-size:9px">
                        Pagi hari
                    </td>
                </tr>
                <?php endif; ?>

                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="4" class="text-center">Belum ada data absen haid pagi hari</td>
                </tr>
                <?php endif; ?>

            </tbody>
        </table>


        <!-- data haid Siang -->
        <table class="table">
            <thead>
                <tr>
                    <td class="p-1 border-top-0 border-bottom-0 font-weight-bold">
                        <h6> Absen Siang hari</h6>
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">Tanggal Haid</td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">Hari Ke- </td>
                    <td class="p-1 border-top-0 border-bottom font-weight-bold" style="font-size:10px">Waktu absen</td>

                </tr>
            </thead>

            <tbody class="text-center">
                <?php if($getSiswiJoin_siang ) : ?>
                <?php foreach( $getSiswiJoin_siang as $gsjs): ?>
                <?php if($gsjs['kelasHaid'] == 2) : ?>

                <tr>
                    <td class="p-0 border-bottom-0 border-top-0" style="font-size:9px">
                        <?php 
                                        if( $gsjs['tanggal']) : 
                                        $bulan  =  date("m", strtotime($gsjs['tanggal']));
                            
                                        if( $bulan == "1"){
                                            $bulan = "Januari";
                                        }elseif($bulan == "2"){
                                            $bulan = "Februari";
                                        }elseif($bulan == "3"){
                                            $bulan = "Maret";
                                        }elseif($bulan == "4"){
                                            $bulan = "April";
                                        }elseif($bulan == "5"){
                                            $bulan = "May";
                                        }elseif($bulan == "6"){
                                            $bulan = "Juni";
                                        }elseif($bulan == "7"){
                                            $bulan = "Juli";
                                        }elseif($bulan == "8"){
                                            $bulan = "Agustus";
                                        }elseif($bulan == "9"){
                                            $bulan = "September";
                                        }elseif($bulan == "10"){
                                            $bulan = "Oktober";
                                        }elseif($bulan == "11"){
                                            $bulan = "November";
                                        }elseif($bulan == "12"){
                                            $bulan = "Desember";
                                        }
                                        
                                        echo date("d", strtotime($gsjs['tanggal'])). " " . $bulan . " " . date("Y", strtotime($gsjs['tanggal'])) ;
                                    
                                    endif;
                                ?>

                    </td>
                    <td class="p-0 border-bottom-0 border-top-0" style="font-size:9px">
                        Hari Ke- <?= $gsjs['harike']; ?>
                    </td>
                    <td class="p-0 border-bottom-0 border-top-0" style="font-size:9px">
                        Siang hari
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>

                <?php else : ?>
                <tr>
                    <td colspan="4" class="text-center">Belum ada data absen haid siang hari</td>
                </tr>
                <?php endif; ?>

            </tbody>
        </table>


        <br>
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

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>