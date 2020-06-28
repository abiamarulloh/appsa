
<!---------------------------- Edit data Murid  --------------------------------------------  -->
<div class="card m-3 shadow mb-4" id="detailMurid">
    <div class="card-header text-center py-3">
        <h1>
            <?= $getMuridKelasJurusanById['nama']; ?>
        </h1>
        <small class="text-muted">Nis tidak bisa diubah, karena dikhawatirkan terjadi duplikat data dengan murid lainnya. <br> 
                Silahkan Hapus Data murid ini dan Buat Kembali, Terimakasih... 
                <br> <b>Untuk Nama, kelas, jurusan dan jenis kelamin dapat diubah sesuai identitas Murid.</b>
        </small>
        <br>
        <a href="<?php 
                    if( $getMuridKelasJurusanById['kelas_murid'] == 1) { 
                        echo  base_url('murid/detail_kelas_x/' . $getMuridKelasJurusanById['nisn_id']); 
                    }elseif($getMuridKelasJurusanById['kelas_murid'] == 2) { 
                        echo  base_url('murid/detail_kelas_xi/' . $getMuridKelasJurusanById['nisn_id']); 
                    } elseif($getMuridKelasJurusanById['kelas_murid'] == 3) {
                        echo  base_url('murid/detail_kelas_xii/' . $getMuridKelasJurusanById['nisn_id']); 
                     }
                ?>"  class="btn btn-primary btn-sm text-white" ><i class="fas fa-arrow-circle-left"></i> Kembali</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <?php if($this->session->flashdata('flash2')): ?>
                    <?= $this->session->flashdata('flash2'); ?>
                <?php endif; ?>
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col" colspan="2">Tindakan</th>
                    </tr>
                </thead>
                    <!-- form Tambah Murid -->
                    <?php $no = 1 ; ?>
                    <form action="" method="post">
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <input type="text" name="nisn_id"  hidden class="form-control" value="<?= $getMuridKelasJurusanById['nisn_id']; ?>">
                                <?= $getMuridKelasJurusanById['nisn_id']; ?>
                            </td>
                            <td>
                                <input type="text" name="nama" class="form-control" value="<?= $getMuridKelasJurusanById['nama']; ?>">
                                <?= form_error('nama', '<small class="text-danger">' ,'</small>'); ?>               
                            </td>
                        
                        <!-- Jika admin -->
                        <?php if( $user['role_id'] == 1): ?>
                        
                            <td>
                                <div class="form-group">
                                    <select class="form-control"  name="kelas">
                                        <option <?php if($getMuridKelasJurusanById['kelas_murid'] == 1) { echo "selected"; }  ?> value="1">X</option>
                                        <option <?php if($getMuridKelasJurusanById['kelas_murid'] == 2) { echo "selected"; }  ?> value="2">XI</option>
                                        <option <?php if($getMuridKelasJurusanById['kelas_murid'] == 3) { echo "selected"; }  ?> value="3">XII</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control"  name="jurusan">
                                        <?php foreach($jurusanAll as $jurusan) : ?>
                                            <?php if($jurusan['status'] == 0): ?>
                                                    <option  hidden disabled><?= $jurusan['singkatan_jurusan']; ?></option>
                                            <?php elseif($jurusan['status'] == 1) : ?>
                                                    <option value="<?= $jurusan['kode_jurusan']; ?>"><?= $jurusan['singkatan_jurusan']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </td>
                   
                        <!-- Jika walikelas -->
                        <?php else : ?>
                            <td>
                                <div class="form-group">
                                    <select class="form-control"  name="kelas">
                                        <?php if($user['kelas_id'] == 1): ?>
                                            <option value="1">X</option>
                                        <?php elseif ($user['kelas_id'] == 2) : ?>
                                            <option value="2">XI</option>
                                        <?php elseif($user['kelas_id'] == 3): ?>
                                            <option value="3">XII</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control"  name="jurusan">
                                        <?php if($user['jurusan_id'] == 1): ?>
                                            <option value="1">TKJ</option>
                                        <?php elseif ($user['jurusan_id'] == 2) : ?>
                                            <option value="2">AKL</option>
                                        <?php elseif($user['jurusan_id'] == 3): ?>
                                            <option value="3">OTKP</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </td>
                        <?php endif; ?>

                            <td>
                                <div class="form-group">
                                    <select class="form-control"  name="jk">
                                        <option <?php if($getMuridKelasJurusanById['jk'] == 0) { echo "selected"; }  ?>  value="0">P</option>
                                        <option <?php if($getMuridKelasJurusanById['jk'] == 1) { echo "selected"; }  ?> value="1">L</option>
                                    </select>
                                </div>
                            </td>
                            <td colspan="2">
                                <button type="submit" class="btn btn-success btn-sm text-white"> <i class="fas fa-edit"></i> Perbarui Murid</button>
                                <a href="<?= base_url('murid/hapus_murid/') .  $getMuridKelasJurusanById['nisn_id']; ?>" onclick="return confirm('Yakin ingin Menghapus ? Jika data murid ini dihapus maka akan menghapus semua poin yang bersangkutan di murid ini')" class="btn btn-danger btn-sm waffe"><i class="fas fa-fw fa-trash"></i> Hapus Murid</a>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!----------------------------------------   Edit MUrid    ----------------------------------------------->