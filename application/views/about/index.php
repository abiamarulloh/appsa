<div class="container">
    <div class="row">
        <div class="col-md-4 mb-5">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item active"> <i class="fa fa-info"></i> Detail Aplikasi</li>
                        <li class="list-group-item"> <b>Nama Aplikasi :</b> <?= $about_us['name_app']; ?></li>
                        <li class="list-group-item"> <b>Pembuat Aplikasi :</b> <a
                                href="https://www.instagram.com/abiamarulloh/"
                                target="_blank"><?= $about_us['author']; ?></a> </li>
                        <br>
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

        <?php if($user['role_id'] == 1 ) : ?>
        <div class="col-md-4 mt-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h3> <i class="fas fa-school"></i> Form Detail Sekolah</h3>
                    <?= $this->session->flashdata("flash2"); ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name_school">Nama Sekolah</label>
                            <input type="text" class="form-control" id="name_school" name="name_school"
                                placeholder="Nama Sekolah" value="<?= $about_us['name_school']; ?>">
                            <?= form_error('name_school', '<small class="text-danger">' ,'</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="address_school">Alamat Sekolah</label>
                            <input type="text" class="form-control" id="address_school" name="address_school"
                                placeholder="Nama Sekolah" value="<?= $about_us['address_school']; ?>">
                            <?= form_error('address_school', '<small class="text-danger">' ,'</small>'); ?>
                        </div>

                        <div class="input-group mb-3">

                            <div class="custom-file" >
                                <input type="file" class="custom-file-input" name="image" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>