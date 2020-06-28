<div class="container my-5">
    <div class="row ">
        <div class="col-md-8 text-center col-sm-12 mx-auto">
            <p class="display-2" style="font-size:30px;"> Selamat datang di APPSA 
            <br> APLIKASI POIN PELANGGARAN 
             </p>
            <small>
                <?php
                    $tanggal= mktime(date("m"),date("d"),date("Y"));
                    echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
                    date_default_timezone_set('Asia/Jakarta');
                    $jam=date("H:i:s");
                    echo "| Pukul : <b>". $jam." "."</b>";
                    $a = date ("H");
                    if ( $a>=6 && $a<=11 ){
                        echo "<b>, Selamat Pagi !!</b>";
                    }else if($a> 11 && $a<=15){
                        echo ", Selamat Siang !!";}
                    else if ($a> 15 && $a<=18){
                        echo ", Selamat Sore !!";
                    }else if($a >= 18 || $a <= 4 ){ 
                        echo ", <b> Selamat Malam </b>";
                    }else{
                        echo ", <b> Selamat Shubuh </b>";
                    }
                ?> 
            </small>
            <hr>
            <p class="lead text-center">Selamat datang, <span class="font-weight-bolder text-dark"><?= $user['nama'] ?></span> </p>
            <center>
            <img src="<?= base_url(); ?>assets/sbadmin2/img/stayathome.jpg" class="w-50">
            </center>
           
        </div>
    </div>
</div>