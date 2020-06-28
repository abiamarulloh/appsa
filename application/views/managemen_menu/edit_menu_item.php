<div class="container mb-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Edit Menu <br> <?= $about_us['name_school']; ?></h1>
                    <hr>
                    <?= $this->session->flashdata("add_menu"); ?>
                    <form method="post" action="">
                        <input type="text" value="<?= $get_menu_item->id; ?>" name="id" hidden>
                        <div class="form-group">
                            <label for="menu_id">ID Menu</label>
                            <input type="text" name="menu_id" class="form-control" id="menu_id" placeholder="ID Menu" value="<?= $get_menu_item->menu_id; ?>">
                            <?= form_error('menu_id', '<small class="text-danger">' ,'</small>'); ?>                
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control" id="menu_id" placeholder="URL"  value="<?= $get_menu_item->url; ?>">
                            <?= form_error('url', '<small class="text-danger">' ,'</small>'); ?>                
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" name="icon" class="form-control" id="icon" placeholder="Icon"  value="<?= $get_menu_item->icon; ?>">
                            <?= form_error('icon', '<small class="text-danger">' ,'</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama_menu">Nama Menu</label>
                            <input type="text" name="nama_menu" class="form-control" id="nama_menu" placeholder="Nama Menu"  value="<?= $get_menu_item->nama_menu; ?>">
                            <?= form_error('nama_menu', '<small class="text-danger">' ,'</small>'); ?>
                        </div>
                                
                        <a href="<?= base_url();  ?>managemen_menu" class="btn text-white btn-primary mb-2"> <i class="fas fa-arrow-left"></i> </a>

                        <button type="submit" class="btn float-right btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>