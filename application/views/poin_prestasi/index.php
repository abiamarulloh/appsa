<?php if($user['role_id'] == 1) : ?>
<!--------------------  Tambah Poin Pelanggaran awal -------------------------->
<h4 class=" mb-2 text-gray-800 ml-5 m-4"><i class="fas fa-pen"></i> TAMBAH POIN PRESTASI
    <?= $about_us['name_school']; ?> </h4>




<div class="container mb-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <img src="<?= base_url('assets/sbadmin2/img/prestasi.jpg') ?>" class="img-responsive img-thumbnail">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <p class="lead font-weight-bolder">Form Tambah Poin Prestasi</p>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata("danger"); ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="jenis_prestasi">Jenis Prestasi</label>
                                <select class="form-control" id="jenis_prestasi" name="jenis_prestasi">
                                    <option value="0">--Pilih Prestasi--</option>
                                    <?php foreach($prestasi_all as $prestasi) : ?>
                                        <option value="<?= $prestasi['kode']; ?>"><?= $prestasi['jenis_prestasi'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="detail_prestasi">Detail Prestasi</label>
                            <input type="text" name="detail_prestasi" id="detail_prestasi" class="form-control" placeholder="Pasal">
                            <?= form_error('detail_prestasi', '<small class="text-danger">' ,'</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="poin">Poin Prestasi</label>
                            <input type="text" name="poin_prestasi" id="poin" class="form-control"
                                placeholder="Poin">
                            <?= form_error('poin_prestasi', '<small class="text-danger">' ,'</small>'); ?>
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

<!--------------------  Daftar Poin prestasi awal -------------------------->
<h4 class="text-gray-800 ml-5 mb-0 m-4"><i class="fas fa-book"></i> DAFTAR POIN PRESTASI
    <?= $about_us['name_school']; ?> </h4>
<div class="card m-4 shadow-sm p-3 mb-5 bg-white rounded mt-2">
    <div class="card-header py-3 bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Daftar Poin prestasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%">
                <?php if($this->session->flashdata('flash2')): ?>
                <?= $this->session->flashdata('flash2'); ?>
                <?php endif; ?>


                <thead>
                    <tr>
                        <th class="d-css-none">No</th>
                        <th class="d-css-none">Kode</th>
                        <th class="d-css-none">Jenis Prestasi</th>
                        <th>Detail Prestasi</th>
                        <th class="d-css-none">Poin</th>
                        <th class="d-css-none">Hak Akses</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($poin_prestasi as $pprestasi) : ?>
                    <tr>
                        <td scope="row" class="d-css-none"><?= $no++; ?></td>

                        <td class="font-weight-bold d-css-none text-center <?= $pprestasi['warna_prestasi']; ?>">
                            <?= $pprestasi['kode_prestasi']; ?>
                        </td>

                        <td class="d-css-none"><?= $pprestasi['jenis_prestasi'] ?></td>
                        <td><?= $pprestasi['sub_jenis_prestasi'] ?></td>

                        <td class="d-css-none"><?= $pprestasi['poin'] ?></td>
                        <td>
                            <a href="<?= base_url("poin_prestasi/hapus/") . $pprestasi['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus poin  ' + '<?= $pprestasi['sub_jenis_prestasi']; ?>' + ' ? ');" > <i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

                <tfoot>
                    <tr>
                        <th class="d-css-none">No</th>
                        <th class="d-css-none">Kode</th>
                        <th class="d-css-none">Jenis Prestasi</th>
                        <th>Detail Prestasi</th>
                        <th class="d-css-none">Poin</th>
                        <th class="d-css-none">Hak Akses</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!--------------------  Daftar Poin prestasi Akhir -------------------------->