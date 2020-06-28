
<div class="container ">
    <div class="row">
        <div class="col-md-12">


    <!-- Menampilkan Role -->
    <div class="card">
        <div class="card-body">
            <!-- Button -->
            <h4 class="float-left"><i class="fas fa-fw fa-user-check"></i> DAFTAR ROLE <?= $about_us['name_school']; ?></h4>

            <a href="<?= base_url();  ?>managemen_menu/add_role" class="btn text-white btn-primary mb-2 float-right"> <i class="fas fa-fw fa-user-check"></i> Tambah Role</a>

            <a href="<?= base_url();  ?>managemen_menu" class="btn text-white mr-2 float-right btn-primary mr-2 mb-2"> <i class="fas fa-arrow-left"></i> </a>



            <div class="clearfix"></div>
            <?= $this->session->flashdata("add_role"); ?>
            <hr>
            <br>
            
            <div class="table-responsive">
                <table class="table"  id="dataTable" width="100%">
                    <thead class=" bg-primary text-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" class="text-center">ID Role</th>
                            <th scope="col" class="text-center">Role</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($get_role as $role_item) :  ?>
                        <tr>
                            <th scope="row" ><?= $i++; ?></th>
                            <td scope="row" class="bg-secondary text-center font-weight-bolder text-white"><?= $role_item->role_id ?></td>
                            <td class="text-center font-weight-bolder"><?= $role_item->role ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                    <tfoot class=" bg-primary text-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" class="text-center">ID Role</th>
                            <th scope="col" class="text-center">Role</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>
