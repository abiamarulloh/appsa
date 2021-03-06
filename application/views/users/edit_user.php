<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <link rel="shortcut icon" href="<?= base_url('assets/fav/smk.jpg'); ?>" type="image/x-icon">

</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 mx-auto ">

                <h1 class="text-center display-4" style="font-size:30px">Edit User</h1>
                <hr>
                <!-- edit Users -->
                <form action="" method="post" class="mt-3">
                    <input type="text" name="id" value="<?= $getUsersById['id']; ?>" hidden>
                    <div class="form-group">
                        <label for="nama">Nama User</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="<?= $getUsersById['nama']; ?>" placeholder="Nama Users">
                        <?= form_error('nama', '<small class="text-danger">' ,'</small>'); ?>
                    </div>

                    <?php if( $getUsersById['email'] == $user['email']  ) : ?>
                    <div class="form-group">
                        <label for="email">Email User</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="<?= $getUsersById['email']; ?>" readonly placeholder="Email">
                        <?= form_error('email', '<small class="text-danger">' ,'</small>'); ?>
                    </div>
                    <?php else : ?>
                    <div class="form-group">
                        <label for="email">Email User</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="<?= $getUsersById['email']; ?>" placeholder="Email">
                        <?= form_error('email', '<small class="text-danger">' ,'</small>'); ?>
                    </div>
                    <?php endif; ?>


                    <!-- <div class="form-group">
                        <label for="password">Password User</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger">' ,'</small>'); ?>
                    </div> -->

                    <!-- Jika user baru belum dapat kelas dan jurusan dan 
                        Role id nya tidak sama dengan satu maka tampilkan  option kelas dan jurusan
                      -->
                    <?php if($getUsersById['kelas_id'] != null && $getUsersById['jurusan_id'] != null && $getUsersById['role_id'] != 1  ) : ?>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <div class="form-group">
                            <select class="form-control" id="kelas" name="kelas">
                                <option <?php if($getUsersById['kelas_id'] == 1) { echo "selected"; }  ?> value="1">X
                                </option>
                                <option <?php if($getUsersById['kelas_id'] == 2) { echo "selected"; }  ?> value="2">XI
                                </option>
                                <option <?php if($getUsersById['kelas_id'] == 3) { echo "selected"; }  ?> value="3">XII
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <?php foreach($jurusanAll as $jurusan) : ?>
                            <?php if($jurusan['status'] == 1) : ?>
                                <option value="<?= $jurusan['kode_jurusan']; ?>"><?= $jurusan['singkatan_jurusan']; ?>
                                </option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php endif; ?>

                    <!-- Tutup User baru dan role id tidak sama dengan satu -->
                    <!-- Role id 1 = role admin -->

                    <div class="form-group">
                        <label for="description">Deskripsi User</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="<?= $getUsersById['description']; ?>" placeholder="description">
                        <?= form_error('description', '<small class="text-danger">' ,'</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Edit Users</button>

                    <!-- Kembali -->
                    <a href="<?= base_url('users') ?>" class="btn btn-success btn-block "> <i
                            class="fas fa-arrow-left"></i> kembali</a>
                </form>
            </div>
        </div>
    </div>


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