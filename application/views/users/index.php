<h4 class="text-gray-800 mt-5 ml-5 text-uppercase"><i class="fas fa-pen"></i> Tambah Users <?= $about_us['name_school']; ?> </h4>

<!----------------------------------- Tabel Tambah Users data awal  -------------------------------------------->
<!-- DataTales Example -->
<div class="container">
    <div class="row">
        <div class="col-md-8 mb-4">
            <img src="<?= base_url("assets/sbadmin2/img/human.jpg") ?>" alt="Human" class="img-responsive img-thumbnail">
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <p class="lead">Form Tambah Data User</p>
                </div>
                <div class="card-body">
                    <!-- form Tambah Users -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="role_id">Level / Role</label>
                            <div class="form-group">
                                <select class="form-control" id="role_id" name="role_id">
                                    <?php foreach ($role_id as $role) : ?>
                                    <option value="<?= $role['role_id'] ?>"><?= $role['role'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="walas">Nama Users</label>
                            <input type="text" name="nama" id="walas" class="form-control" placeholder="Nama Users">
                            <?= form_error('nama', '<small class="text-danger">' ,'</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Users</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            <?= form_error('email', '<small class="text-danger">' ,'</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="desc">Deskripsi</label>
                            <input type="text" name="desc" id="desc" class="form-control" placeholder="Deskripsi">
                            <?= form_error('desc', '<small class="text-danger">' ,'</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="password">Kata sandi</label>
                            <input type="text" name="password" id="password" class="form-control" placeholder="kata sandi">
                            <?= form_error('password', '<small class="text-danger">' ,'</small>'); ?>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-plus"></i> Tambah Akses Users</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!--------------------- Tambah Users  ------------------------------->



<br> <br>

<!----------------- ------------------ Tabel Data Users data awal  -------------------------------------------->
<h4 class=" mb-2 text-gray-800 ml-3 text-uppercase"><i class="fas fa-book"></i> Daftar Users <?= $about_us['name_school']; ?> </h4>
<!-- DataTales Example -->
<div class="card m-3 shadow-sm mb-4">
    <div class="card-header bg-primary text-white py-3">
        <h6 class="m-0 font-weight-bold">Data Users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="dataTable" width="100%">
                <?php if($this->session->flashdata('flash2')): ?>
                <?= $this->session->flashdata('flash2'); ?>
                <?php endif; ?>
                <thead>
                    <tr>
                        <th scope="col" class="d-css-none">No</th>
                        <th scope="col" class="d-css-none">Nama Users</th>
                        <th scope="col">Email Users</th>
                        <th scope="col" class="d-css-none">Kelas</th>
                        <th scope="col" class="d-css-none">Jurusan</th>
                        <th scope="col" class="d-css-none">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- List Daftar Users -->
                    <?php $no = 1; ?>
                    <?php foreach($getUsers as $gW) : ?>
                    <tr>
                        <td class="d-css-none"><?= $no++; ?></td>
                        <td class="d-css-none"><?= $gW['nama']; ?></td>


                        <td class="font-weight-bolder">
                            <?= $gW['email']; ?>
                            <br>
                            <!-- Lihat Password -->
                            <!-- <div class="input-group mb-3">
                                <input type="password" class="form-control" disabled value="<?= $gW['password']; ?>"
                                    id="password">

                                <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-secondary see-password"><i
                                            class="fas fa-eye"> </i></button>
                                </div>
                            </div> -->

                            <!-- Action   hapus -->
                            <?php if($user['email'] != $gW['email'] ) : ?>
                                <a href="<?= base_url('users/hapus_users/') . $gW['id']; ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin Akan Hapus Data Users ??');"><i class="fas fa-trash"></i>
                                Hapus</a>
                            <?php endif; ?>

                            <!-- Action Edit -->
                            <a href="<?= base_url('users/edit_user/') . $gW['id']; ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>

                            <?php if($gW['kelas_id'] == null && $gW['jurusan_id'] == null && $gW['role_id'] != 1) : ?>
                                <a href="<?= base_url('users/give_access_user/') . $gW['id']; ?>" class="btn btn-sm btn-success">
                                    <i class="fas fa-plus"></i>
                                    Beri Akses
                                </a>
                            <?php endif; ?>

                            <a href="<?= base_url('users/edit_password_user/') . $gW['id']; ?>" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                                Ganti Password
                            </a>


                        </td>
                        <td class="d-css-none">
                            <?php if($gW['kelas_id'] == 1): ?>
                            X
                            <?php elseif ($gW['kelas_id'] == 2) : ?>
                            XI
                            <?php elseif($gW['kelas_id'] == 3): ?>
                            XII
                            <?php else : ?>
                            -
                            <?php endif; ?>
                        </td>
                        <td class="d-css-none">
                            <?php if($gW['jurusan_id'] == 1): ?>
                            TKJ
                            <?php elseif ($gW['jurusan_id'] == 2) : ?>
                            AKL
                            <?php elseif($gW['jurusan_id'] == 3): ?>
                            OTKP
                            <?php else : ?>
                            -
                            <?php endif; ?>
                        </td>

                        <td class="d-css-none">
                            <?= $gW['description']; ?>
                        </td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!--------------------- Daftar Users  ------------------------------->