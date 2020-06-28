
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $title; ?></title>

  <link rel="shortcut icon" href="<?= base_url(); ?>assets/favicon/smk.jpg" type="image/x-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url(); ?>assets/MDB-Free/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?= base_url(); ?>assets/MDB-Free/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?= base_url(); ?>assets/MDB-Free/css/style.css" rel="stylesheet">
</head>

<body>

 <!-- Start your project here-->
 <div style="height: 100vh">
    <div class="flex-center flex-column">
      <h1 class="animated fadeIn mb-2">Cari data Haid dengan NIS</h1>
            <!-- Default form login -->
            <form class="text-center border border-light p-5" action="" method="post">
                <!-- Email -->
                <input type="text" autocomplete="off" name="keyword" class="form-control mb-4" placeholder="Mesin Pencarian data Haid">

                <!-- Sign in button -->
                <button class="btn btn-primary btn-block my-2" name="submit" type="submit">Telusuri</button>
                <a href="<?= base_url("auth/index"); ?>" class="btn btn-warning btn-user btn-block">
                    Kembali
                </a>
                <br>
         
            </form>
            <!-- Default form login -->

    </div>
  </div>
  <!-- /Start your project here-->


<?php if( $getMuridKelasJurusanById['nisn_id'] ): ?>
<div class="container mb-5">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                        <?php if($this->session->flashdata('flash2')): ?>
                            <?= $this->session->flashdata('flash2'); ?>
                        <?php endif; ?>
                        <thead>
                            <tr>
                                <th colspan="5" class="border-bottom-0 border-top-0"><h6 class="text-center text-uppercase font-weight-bold">Laporan Absensi Haid</h6></th>
                            </tr>
                            <tr>
                                <th class="border-bottom-0 border-top-0 p-0 font-weight-bold"><h6> Detail Siswi</h6></th>
                            </tr>
                            <tr>
                                <th scope="col" class="border-top-0 p-0 text-center font-weight-bold" style="font-size:11px">Nis</th>
                                <th scope="col" class="border-top-0 p-0 text-center font-weight-bold" style="font-size:11px">Nama Lengkap</th>
                                <th scope="col" class="border-top-0 p-0 text-center font-weight-bold" style="font-size:11px">Kelas</th>
                                <th scope="col" class="border-top-0 p-0 text-center font-weight-bold" style="font-size:11px">Jurusan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="p-0 border-top-0  text-center" style="font-size:9px"><?= $getSiswiById['nisn_id'];  ?></td>
                                <td class="p-0 border-top-0  text-center" style="font-size:9px"><?= $getSiswiById['nama'];  ?></td>
                                <td class="p-0 border-top-0  text-center" style="font-size:9px">
                                    <?php if($getSiswiById['kelas'] == 1): ?>
                                    X
                                    <?php elseif ($getSiswiById['kelas'] == 2) : ?>
                                    XI
                                    <?php elseif($getSiswiById['kelas'] == 3): ?>
                                    XII
                                    <?php endif; ?>
                                </td>
                                <td class="p-0 border-top-0  text-center" style="font-size:9px">
                                    <?php if($getSiswiById['jurusan'] == 1): ?>
                                    TKJ
                                    <?php elseif ($getSiswiById['jurusan'] == 2) : ?>
                                    AKL
                                    <?php elseif($getSiswiById['jurusan'] == 3): ?>
                                    OTKP
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                            
                    </table>
                    
                    <br>


                    <!-- data haid pagi -->
                    <table class="table">
                    <thead>
                        <tr>
                            <td class="p-1 border-top-0 border-bottom-0 font-weight-bold"><h6>Absen Pagi hari</h6></td>
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
                                            Hari Ke-  <?= $gsjp['harike']; ?> 
                                        </td>
                                        <td class="p-0 border-bottom-0 border-top-0" style="font-size:9px">
                                            Pagi hari
                                        </td>
                                    </tr>
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
                            <td class="p-1 border-top-0 border-bottom-0 font-weight-bold"><h6> Absen Siang hari</h6></td>
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
                                        Hari Ke-  <?= $gsjs['harike']; ?> 
                                    </td>
                                    <td class="p-0 border-bottom-0 border-top-0" style="font-size:9px">
                                        Siang hari
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data absen haid siang hari</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?php elseif($this->input->post("keyword") != $getMuridKelasJurusanById['nisn_id']): ?>
    <?php
    // Membuat random angka
        $rand = rand(1,29);
        $png = ".png";
    ?>
<h1 class="text-center mb-5">
<img class="img-profile rounded-circle s-50" src="<?= base_url('assets/sbadmin2/img/png/') . $rand  . $png ; ?>" >
<br>    Oops, data tidak ditemukan.
</h1> 

<?php endif; ?>
 

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?= base_url(); ?>assets/MDB-Free/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?= base_url(); ?>assets/MDB-Free/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?= base_url(); ?>assets/MDB-Free/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?= base_url(); ?>assets/MDB-Free/js/mdb.min.js"></script>
</body>

</html>

