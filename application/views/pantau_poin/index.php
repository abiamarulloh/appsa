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
      <h1 class="animated fadeIn mb-2">Cari data Poin dengan NIS</h1>
            <!-- Default form login -->
            <form class="text-center border border-light p-5" action="" method="post">
                <!-- Email -->
                <input type="text" autocomplete="off" name="keyword" class="form-control mb-4" placeholder="Mesin Pencarian data Poin">

            
                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-2" name="submit" type="submit">Telusuri</button>
                <a href="<?= base_url("auth/index"); ?>" class="btn btn-primary btn-user btn-block">
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
        <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <?php if($this->session->flashdata('flash2')): ?>
                            <?= $this->session->flashdata('flash2'); ?>
                        <?php endif; ?>

                        <!-- Detail Murid -->
                        <thead>
                            <tr>
                                <th colspan="5" class=" p-1 border-0">
                                    <h6 class="text-center font-weight-bolder text-left text-uppercase" style="font-size:14px"> 
                                        Laporan Poin Pelanggaran
                                    </h6>
                                </th> 
                            </tr>
                            <tr>
                                <th colspan="5" class="p-1 border-0">
                                    <h6 class="font-weight-bolder text-left text-uppercase" style="font-size:11px">
                                        Detail Murid
                                    </h6>
                                </th>
                            </tr>
                            <tr>
                                <th class="p-1 border-bottom-0 text-center font-weight-bold" style="font-size:10px">Nis</th>
                                <th class="p-1 border-bottom-0 text-center font-weight-bold" style="font-size:10px">Nama Lengkap</th>
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
                                    <?php if($getMuridKelasJurusanById['kelas'] == 1): ?>
                                    X
                                    <?php elseif ($getMuridKelasJurusanById['kelas'] == 2) : ?>
                                    XI
                                    <?php elseif($getMuridKelasJurusanById['kelas'] == 3): ?>
                                    XII
                                    <?php endif; ?>
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



                    <!-- Detail Pelanggaran -->
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th colspan="5" class="p-1 border-0">
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
                            <?php foreach( $getMuridKelasJurusanByIdPoin as $gmkjbi): ?>
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

                            </tr>
                            <?php endforeach; ?>
                            

                            <tr>
                                <td colspan="5" class="p-0 text-center font-weight-bold" style="font-size:10px">Total Poin dan Pelanggaran</td>
                            </tr>
                            <tr>
                                <td class="p-0 text-center font-weight-bold" style="font-size:10px">Total Poin Pelanggaran</td>
                                <td colspan="3" class="p-0 text-center" style="font-size:10px">
                                    <?php if($total_poin) : ?>
                                        <?= $total_poin; ?> Poin
                                    <?php else: ?>
                                        <li class="fas fa-minus"></li>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="p-0 text-center font-weight-bold border-top-0" style="font-size:10px">Total Pelanggaran</td>
                                <td colspan="3" class="p-0 text-center border-top-0" style="font-size:10px">
                                
                                    <?php foreach( $getMuridKelasJurusanByIdPoin as $pelanggaran): ?>
                                        <!-- Kemudian Letakkan hasil Looping tersebut kedalam variabel berbentuk array -->
                                        <?php $total_pelanggaran[] = $pelanggaran['pelanggaran']; ?>
                                        
                                        <?php $pelanggaran = $pelanggaran['pelanggaran']; ?>
                                        
                                    <?php endforeach; ?>

                                        <?php if( $pelanggaran == NULL) : ?>
                                            <li class="fas fa-minus"></li>
                                        <?php elseif( $pelanggaran != NULL) : ?>
                                            <?= count($total_pelanggaran); ?> Pelanggaran
                                        <?php endif; ?>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                            <!-- Detail Prestasi -->
                            <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="5" class="p-1 border-0">
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
                                <?php foreach( $poin_prestasi_by_id_poin_prestasi as $ppbipp): ?>
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
                                </tr>
                                    
                                <?php endforeach; ?>
                                

                                <tr>
                                    <td colspan="5" class="p-0 text-center font-weight-bold" style="font-size:12px">
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
                                
                                    <?php foreach( $poin_prestasi_by_id_poin_prestasi as $ppbia): ?>
                                    <!-- Kemudian Letakkan hasil Looping tersebut kedalam variabel berbentuk array -->

                                        <?php $total_prestasi[] = $ppbia['jumlah_prestasi']; ?>
                                        
                                        <?php $prestasi = $ppbia['jumlah_prestasi']; ?>
                                        
                                    <?php endforeach; ?>

                                        <?php if( $prestasi == NULL) : ?>
                                            <span class="font-weight-bold">-</span>
                                        
                                        <?php elseif( $prestasi != NULL) : ?>
                                            <?= count($total_prestasi); ?> Prestasi
                                            
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
                    </div>
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

