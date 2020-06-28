<!-- DataTales Example -->
<div class="card shadow-sm m-3">
    <div class="card-header">
        <h5 class="font-weight-bold text-uppercase">Beri Poin Pelanggaran <?= $about_us['name_school']; ?></h5>
        <a href="<?= base_url('murid'); ?>" class="btn btn-warning btn-sm text-white float-right mr-5"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" width="100%">
                <?php if($this->session->flashdata('flash2')): ?>
                <?= $this->session->flashdata('flash2'); ?>
                <?php endif; ?>
                <thead class="bg-danger text-white">
                    <tr>
                        <th scope="col">Nama Murid</th>
                        <th scope="col">Poin</th>
                        <th scope="col">Tanggal Kejadian</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="" method="post">
                        <tr>
                            <td>
                                <div class="md-form">
                                    <input type="text" hidden name="nisn_id" class="border-0"
                                        value="<?= $getMuridById['nisn_id']; ?>">
                                    <input type="text" hidden name="kelas" class="border-0"
                                        value="<?= $getMuridById['kelas']; ?>">

                                    <h4> <small> 
                                            <input type="text" disabled class="border-0"
                                            value="<?= $getMuridById['nama']; ?>"> 
                                        </small>
                                    </h4>
                                </div>
                            </td>

                            <td>
                                <div class="md-form">
                                    <select class="form-control mb-5" name="poin">
                                        <?php $no = 1; ?>
                                        <?php foreach($poin as $p): ?>
                                        <option value="<?= $p['id'] ?>"><?= $no++;  ?>.<?= $p['pelanggaran']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                              
                                <div class="md-form">
                                    <input placeholder="Selected date" type="date" autocomplete="off" name="date" class="form-control datepicker">
                                </div>
                                <?= form_error('date', '<small class="text-danger">' ,'</small>'); ?>
                                <br>

                                <button type="submit" class="btn btn-danger btn-sm">Beri Poin</button>
                            </td>
                        </tr>
                    </form>
                </tbody>

            </table>
        </div>
    </div>
</div>