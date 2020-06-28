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

                <h1 class="text-center display-4" style="font-size:30px">Beri Akses User</h1>
                <hr>
                <!-- edit Users -->
                <form action="" method="post" class="mt-3">
                    <input type="text" name="id" value="<?= $getUsersById['id']; ?>" hidden>

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <div class="form-group">
                            <select class="form-control" id="kelas" name="kelas">
                                <option value="1">X</option>
                                <option value="2">XI</option>
                                <option value="3">XII</option>
                            </select>
                        </div>
                        <?= form_error('kelas', '<small class="text-danger">' ,'</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <?php foreach($jurusanAll as $jurusan) : ?>
                            <?php if( $jurusan['status'] == 1 ): ?>
                            <option value="<?= $jurusan['kode_jurusan']; ?>">
                                <?= $jurusan['singkatan_jurusan']; ?>
                            </option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('jurusan', '<small class="text-danger">' ,'</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Beri Akses Users</button>

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