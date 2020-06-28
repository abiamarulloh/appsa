<div class="container mb-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Edit Akses Menu <br> <?= $about_us['name_school']; ?></h1>
                    <?= $this->session->flashdata("access_menu"); ?>
                    <hr>
                    <form method="post" action="">
                        <input type="text" name="id" hidden value="<?= $get_menu_role_item->id_menu_role; ?>">

                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select class="form-control" id="role_id" name="role_id">
                                    <option value="0">-- Pilih Role  --</option>
                                <?php foreach($get_role as $role_item) : ?>
                                    <option value="<?= $role_item->role_id; ?>" 
                                        <?php if($role_item->role_id == $get_menu_role_item->id_role) { echo "selected"; }; ?>
                                    >
                                    <?= $role_item->role; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="menu_id">Menu</label>
                            <select class="form-control" id="menu_id" name="menu_id">
                                <option value="0">-- Pilih Menu  --</option>
                                <?php foreach($get_menu as $menu_item) : ?>
                                    <option value="<?= $menu_item->menu_id; ?>" 
                                        <?php if($menu_item->menu_id == $get_menu_role_item->id_menu) { echo "selected"; }; ?>
                                    >
                                    
                                    <?= $menu_item->nama_menu; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                 

                       
                        <a href="<?= base_url();  ?>managemen_menu/v_access_menu" class="btn text-white btn-primary mb-2"> <i class="fas fa-arrow-left"></i> </a>

                        <button type="submit" class="btn float-right btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>