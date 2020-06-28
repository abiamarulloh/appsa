<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="m-3  d-inline-block text-uppercase"> <li class="fas fa-book"></li> Daftar Jurusan <?= $about_us['name_school']; ?></h4>
            <a href="<?= base_url(); ?>jurusan/tambah_jurusan" class="btn btn-success btn-sm"> <i class="fas fa-plus fa-fw"></i> Tambah Jurusan</a>
            <br> <br>
            <div class="card">
            <?php if($this->session->flashdata('flash2')): ?>
                <?= $this->session->flashdata('flash2'); ?>
            <?php endif; ?>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach($jurusanAll as $jurusan) : ?>
                            <?php if($jurusan['status'] == 0): ?>
                                <li class="list-group-item"> <?= $jurusan['kode_jurusan']; ?> | <s> <?= $jurusan['nama_jurusan']; ?> </s>
                                    <a href="<?= base_url('jurusan/hapus_jurusan/') . $jurusan['id']; ?>" class="btn btn-sm btn-danger float-right"  onclick="return confirm('Yakin untuk menghapus jurusan ' + '<?= $jurusan['nama_jurusan'] ?>')">Hapus</a>
                                    <a href="<?= base_url('jurusan/enable/') . $jurusan['id']; ?>" class="btn btn-sm btn-primary float-right mr-2">Enable</a>
                                </li>
                               
                            <?php elseif($jurusan['status'] == 1) : ?>
                                <li class="list-group-item  bg-primary text-white"><?= $jurusan['kode_jurusan']; ?> | <?= $jurusan['nama_jurusan']; ?>
                                    <a href="<?= base_url('jurusan/disable/') . $jurusan['id']; ?>" class="btn btn-sm btn-info float-right">Disable</a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>   
                </div>
            </div>
        </div>
    </div>
</div>
