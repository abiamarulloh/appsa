


<!-- DataTales Example -->


<div class="card shadow-sm m-3">
  <div class="card-header">
    <h4 class="font-weight-bold text-uppercase">Beri Poin prestasi <?= $about_us['name_school']; ?></h4>
    <a href="<?= base_url('murid'); ?>"  class="btn btn-warning text-white float-right mr-5" ><i class="fas fa-arrow-circle-left"></i> Kembali</a>  
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered" width="100%" >
        <?php if($this->session->flashdata('flash2')): ?>
            <?= $this->session->flashdata('flash2'); ?>
        <?php endif; ?>
        <thead  class="bg-success text-white">
            <tr>
            <th scope="col">Nama Murid</th>
            <th scope="col">Poin Prestasi</th>
            <th scope="col">Tanggal Kejadian</th>                    
            </tr>
        </thead>
        <tbody>
            <form action="" method="post">
            <tr>
            <td>
                <div class="md-form">
                    <input type="text" hidden name="nisn_id" class="border-0" value="<?= $getMuridById['nisn_id']; ?>">  

                    <input type="text" hidden  name="kelas" class="border-0" value="<?= $getMuridById['kelas']; ?>">


                    <h4> <small> <input type="text" disabled class="border-0" value="<?= $getMuridById['nama']; ?>">  </small></h4>
                </div>
            </td>

            <td>
                <div class="md-form">
                    <select class="form-control mb-5"  name="poin_prestasi">
                        <?php foreach($poin_prestasi as $p): ?>
                            <option value="<?= $p['poin_id'] ?>"> 
                                <?= $p['jenis_prestasi'] . " => " . $p['sub_jenis_prestasi'] . 
                                    " => Poin " . $p['poin'] ; 
                                ?>
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
                
                <button  type="submit" class="btn btn-success">Beri Poin Prestasi</button>
            </td>
            </tr>
            </form>
        </tbody>

      </table>
    </div>
  </div>
</div>




