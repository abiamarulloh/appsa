<div class="container">
    <div class="row">
        <div class="col-md-12">


            <!-- Menampilkan Role Access Menu -->
            <div class="card">
                <div class="card-body">
                    <!-- Button -->

                    <h4 class="float-left"><i class="fab fa-fw fa-accessible-icon"></i> DAFTAR ROLE ACCESS MENU <?= $about_us['name_school']; ?></h4>

                    <a href="<?= base_url();  ?>managemen_menu/add_access_menu" class="btn text-white btn-primary mb-2 float-right">  <i class="fab fa-fw fa-accessible-icon"></i>  Tambah Role Access Menu</a>

                    <a href="<?= base_url();  ?>managemen_menu" class="btn text-white mr-2 float-right btn-primary mb-2"> <i class="fas fa-arrow-left"></i> </a>

                    <div class="clearfix"></div>
                    <?= $this->session->flashdata("access_menu"); ?>
                    <hr>
                    <br>
                    
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%">
                            <thead class=" bg-primary text-white">
                                <tr>
                                    <th scope="col" class="d-css-none">No</th>
                                    <th scope="col" class="text-center d-css-none">ID Role</th>
                                    <th scope="col" class="text-center">Role</th>
                                    <th scope="col" class="text-center d-css-none">ID Menu</th>
                                    <th scope="col" class="text-center">Menu</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                                

                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($get_menu_role as $menu_role_item) :  ?>
                                <tr>
                                    <th scope="row" class="d-css-none" ><?= $i++; ?></th>
                                    
                                    <td scope="row" class="bg-secondary text-center d-css-none font-weight-bolder text-white"><?= $menu_role_item->role_id ?></td>
                                    <td class="text-center font-weight-bolder"><?= $menu_role_item->role ?></td>
                                    
                                    <!-- Menu -->
                                    <td scope="row" class="bg-secondary text-center  font-weight-bolder d-css-none text-white"><?= $menu_role_item->menu_id ?></td>
                                    <td class="text-center  font-weight-bolder"><?= $menu_role_item->nama_menu ?></td>

                                    <td>
                                        <a href="<?= base_url("managemen_menu/delete_access_menu_item/") . $menu_role_item->id_menu_role; ?>"  onclick="return confirm('Apakah kau yakin akan menghapus hak akses menu <?= $menu_role_item->nama_menu; ?> di level role <?=  $menu_role_item->role; ?>  ?')"  class="badge badge-danger">Delete</a>
                                      
                                        <a href="<?= base_url("managemen_menu/edit_access_menu_item/") . $menu_role_item->id_menu_role; ?>"   class="badge badge-warning">Edit</a>
                                       

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            
                            <tfoot class=" bg-primary text-white">
                                <tr>
                                    <th scope="col" class="d-css-none">No</th>
                                    <th scope="col" class="text-center d-css-none">ID Role</th>
                                    <th scope="col" class="text-center">Role</th>
                                    <th scope="col" class="text-center d-css-none">ID Menu</th>
                                    <th scope="col" class="text-center">Menu</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
