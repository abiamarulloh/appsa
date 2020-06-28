<?php if($user['role_id'] == 1) : ?>
<!--------------------  Tambah Poin Pelanggaran awal -------------------------->
<h4 class=" mb-2 text-gray-800 ml-5 m-4"><i class="fas fa-pen"></i> TAMBAH POIN PELANGGARAN <?= $about_us['name_school']; ?> </h4>




<div class="container mb-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <img src="<?= base_url('assets/sbadmin2/img/law.jpg') ?>" class="img-responsive img-thumbnail">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <p class="lead font-weight-bolder">Form Tambah Poin Pelanggaran</p>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="pelanggaran">Pelanggaran</label>
                            <input type="text" name="pelanggaran" id="pelanggaran" class="form-control"
                                placeholder="Pelanggaran">
                            <?= form_error('pelanggaran', '<small class="text-danger">' ,'</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="pasal">Pasal</label>
                            <input type="text" name="pasal" id="pasal" class="form-control" placeholder="Pasal">
                            <?= form_error('pasal', '<small class="text-danger">' ,'</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="poin_pelanggaran">Poin pelanggaran</label>
                            <input type="text" name="poin_pelanggaran" id="poin_pelanggaran" class="form-control"
                                placeholder="Poin">
                            <?= form_error('poin_pelanggaran', '<small class="text-danger">' ,'</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tindakan">Tindakan</label>
                            <input type="text" name="tindakan" id="tindakan" class="form-control" placeholder="Tindakan">
                            <?= form_error('tindakan', '<small class="text-danger">' ,'</small>'); ?>
                        </div>
                   

                        <button type="submit" class="btn btn-success btn-sm mt-2">Tambah Data Poin Pelanggaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--------------------  Tambah Poin Pelanggaran akhir -------------------------->
<?php endif; ?>

<br>
<!--------------------  Daftar Poin Pelanggaran awal -------------------------->
<h4 class="text-gray-800 ml-5 m-4"><i class="fas fa-book"></i> DAFTAR POIN PELANGGARAN <?= $about_us['name_school']; ?> </h4>
<div class="card m-4 shadow-sm p-3 mb-5 bg-white rounded mt-2 ">
    <div class="card-header py-3 bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Daftar Poin Pelanggaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped " id="dataTable" width="100%">
                <?php if($this->session->flashdata('flash2')): ?>
                <?= $this->session->flashdata('flash2'); ?>
                <?php endif; ?>

                <thead>
                    <tr>
                        <th class="d-css-none">No</th>
                        <th>Pelanggaran</th>
                        <th class="d-css-none">Pasal</th>
                        <th class="d-css-none">Poin</th>
                        <th class="d-css-none">Tindakan</th>
                        <th class="d-css-none">Hak Akses</th>

                    </tr>
                </thead>

                <?php $no =1; ?>
                <tbody>
                    <?php foreach($poin_pelanggaran as $p) : ?>
                    <tr>
                        <th scope="row" class="text-center d-css-none"><?= $no++; ?></th>
                        <td><?= $p['pelanggaran']; ?></td>
                        <td class="d-css-none"><?= $p['pasal']; ?></td>
                        <td class="d-css-none"><?= $p['poin']; ?></td>
                        <td class="d-css-none"><?= $p['tindakan']; ?></td>
                        <td>
                            <a href="<?= base_url("poin_pelanggaran/hapus/") . $p['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus poin  ' + '<?= $p['pelanggaran']; ?>' + ' ? ');" > <i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

                <tfoot>
                    <tr>
                        <th class="d-css-none">No</th>
                        <th class="d-css-none">Pelanggaran</th>
                        <th class="d-css-none">Pasal</th>
                        <th class="d-css-none">Poin</th>
                        <th class="d-css-none">Tindakan</th>
                        <th class="d-css-none">Hak Akses</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!--------------------  Daftar Poin Pelanggaran Akhir -------------------------->