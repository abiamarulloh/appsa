<div class="container mb-5">
    <div class="row">
        <div class="col-md-12">

            <!-- Menampilkan menu -->
            <div class="card">
                <div class="card-body">

        
                    <h4 class="float-left"><i class="fab fa-fw fa-accessible-icon"></i> DAFTAR  MENU <?= $about_us['name_school']; ?></h4>

                    <a href="<?= base_url();  ?>managemen_menu/add_menu" class="btn text-white btn-primary mb-2 float-right">  <i class="fab fa-fw fa-accessible-icon"></i>  Tambah Menu</a>

                    <a href="<?= base_url();  ?>managemen_menu" class="btn text-white mr-2 float-right btn-primary mb-2"> <i class="fas fa-arrow-left"></i> </a>

                    
                    <div class="clearfix"></div>
                    <?= $this->session->flashdata("add_menu"); ?>
                    <hr>
                    <br>
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col"  class="d-css-none">No</th>
                                    <th scope="col"  class="d-css-none">ID Menu</th>
                                    <th scope="col"  class="d-css-none">Url</th>
                                    <th scope="col"  class="d-css-none">Icon</th>
                                    <th scope="col">Nama Menu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($get_menu as $menu_item) :  ?>
                                <tr>
                                    <th scope="row"  class="d-css-none"><?= $i++; ?></th>
                                    <td class="bg-secondary text-center text-white d-css-none"><?= $menu_item->menu_id ?></td>
                                    <td  class="d-css-none"><?= $menu_item->url ?></td>
                                    <td  class="d-css-none"><?= $menu_item->icon ?></td>
                                    <td><?= $menu_item->nama_menu ?></td>
                                    <td> 
                                        <a href="<?= base_url("managemen_menu/delete_menu_item/") . $menu_item->id; ?>"  onclick="return confirm('Apakah kau yakin akan menghapus menu <?=  $menu_item->nama_menu; ?>  ?')"  class="badge badge-danger">Delete</a>

                                        <a href="<?= base_url("managemen_menu/edit_menu_item/") . $menu_item->id; ?>"   class="badge badge-warning">Edit</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>

                            <tfoot class=" bg-primary text-white">
                                <tr>
                                    <th scope="col"  class="d-css-none">No</th>
                                    <th scope="col"  class="d-css-none">ID Menu</th>
                                    <th scope="col"  class="d-css-none">Url</th>
                                    <th scope="col"  class="d-css-none">Icon</th>
                                    <th scope="col">Nama Menu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </tfoot>


                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
