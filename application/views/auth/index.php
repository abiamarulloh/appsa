<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/assets/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- favicon buatan -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/favicon/logos.webp" type="image/x-icon">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/sbadmin2/css/style.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light  bg-primary shadow-lg">
        <div class="container">

            <a class="navbar-brand text-white font-weight-bolder" href="#">
                <img src="<?= base_url("assets/sbadmin2/img/logo_appsa.png") ?>" width="30" height="30"
                    class="d-inline-block align-top">
                <?= $about_us['name_app']; ?> <br> <sup><?= $about_us['name_school']; ?></sup>
            </a>

            <a class="navbar-brand text-white font-weight-bolder" href="#">
                <img src="<?= base_url("assets/sbadmin2/img/about/") . $about_us['image']; ?>" width="50" height="50"
                    class="d-inline-block align-top bg-white rounded">
            </a>


        </div>
    </nav>


    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h3>Data Covid-19 Terkini Di Indonesia</h3>
                        <hr>
                        <?php  foreach($datalist as $list) : ?>
                        <?php if($list->countryRegion == "Indonesia") : ?>
                        <div class="row text-center font-weight-bold">
                            <div class="col-md-4 bg-warning text-white p-2">
                                <h5>POSITIF COVID-19</h3>
                                    <?=  $list->confirmed; ?> Orang
                            </div>

                            <div class="col-md-4 bg-success text-white p-2">
                                <h5>SEMBUH COVID-19</h3>
                                    <?=  $list->recovered; ?> Orang
                            </div>

                            <div class="col-md-4 bg-danger text-white p-2">
                                <h5>MENINGGAL COVID-19</h3>
                                    <?=  $list->deaths; ?> Orang
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <h1 class="display-4">#StayAtHome</h1>
                <img src="<?= base_url("assets/sbadmin2/img/stayAtHome.jpg"); ?>"
                    class="img-responsive img-thumbnail border-0">
            </div>
        </div>
    </div>

    <div class="container mb-4">
        <div class="row">
            <!-- Form -->
            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="h6 text-gray-900 mb-4 font-weight-bold  text-center">
                            <img src="<?= base_url("assets/sbadmin2/img/about/") . $about_us['image']; ?>" 
                                alt="Logo SMK" class="img-thumbnail border-0" width="150px">

                            <br>
                            Aplikasi Poin <br>
                            <?= $about_us['name_school']; ?> </h1>

                            <p class="text-center font-weight-bolder">Masuk</p>
                            <hr>
                            <?php if($this->session->flashdata("flash")) : ?>
                            <?= $this->session->flashdata("flash")  ?>
                            <?php endif; ?>

                            <form class="user" method="post" action="">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        placeholder="Enter Email Address...">
                                    <?= form_error('email', '<small class="text-danger ml-3">' ,'</small>'); ?>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text rounded-pill-left"><i
                                                class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-user" id="password"
                                        name="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger">' ,'</small>'); ?>
                                    <div class="input-group-append rounded-pill-right">
                                        <button class="btn btn-outline-secondary rounded-pill-right" type="button"
                                            onclick="showHide()" id="button-addon2">
                                            <i class="fas fa-key"></i>
                                        </button>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <div class="form-group text-center pt-2">
                                    <a href="<?= base_url("pantau_poin/index"); ?>"
                                        class="btn  btn-success btn-user btn-block">
                                        Lihat Poin Pribadi
                                    </a>
                                    <a href="<?= base_url("pantau_haid/index"); ?>"
                                        class="btn btn-danger btn-user btn-block">
                                        Lihat Haid Pribadi
                                    </a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ml-auto p-2">
                <ul class="list-group">
                    <li class="list-group-item active"> <i class="fa fa-school"></i> Detail Sekolah</li>
                    <li class="list-group-item"> <b>Logo Sekolah :</b>
                        <img src="<?= base_url("assets/sbadmin2/img/about/") . $about_us['image']; ?>" alt="Logo SMK"
                            class="img-thumbnail">
                    </li>
                    <li class="list-group-item"> <b>Nama Sekolah :</b> <?= $about_us['name_school']; ?></li>
                    <li class="list-group-item"> <b>Alamat Sekolah :</b> <?= $about_us['address_school']; ?></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="card border-0 bg-gradient-primary text-white rounded-0 shadow-lg">
        <div class="card-body">
            <div class="container">
                <h5 class="card-title font-weight-bolder">
                    <img src="<?= base_url("assets/sbadmin2/img/logo_appsa.png") ?>" width="30" height="30"
                        class="d-inline-block align-top">
                    <span class="p-2">APPSA</span>
                </h5>
                <p class="card-text">APLIKASI POIN <?= $about_us['name_school']; ?></p>

                <small>&copy; 2019 APPSA. All rights reserved. </s>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/assets/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/assets/sbadmin2/js/sb-admin-2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

    });

    function showHide() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
</body>

</html>