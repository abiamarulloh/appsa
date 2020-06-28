<div class="container mb-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Tambah Role <br> <?= $about_us['name_school']; ?></h1>
                    <?= $this->session->flashdata("add_role"); ?>
                    <hr>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="role_id">ID Role</label>
                            <input type="text" name="role_id" class="form-control" id="role_id" placeholder="ID Menu">
                            <?= form_error('role_id', '<small class="text-danger">' ,'</small>'); ?>                
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control" id="role" placeholder="Role">
                            <?= form_error('role', '<small class="text-danger">' ,'</small>'); ?>                
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="description">
                            <?= form_error('description', '<small class="text-danger">' ,'</small>'); ?>                
                        </div>
                        
                                
                        <a href="<?= base_url();  ?>managemen_menu/v_role" class="btn text-white btn-primary mb-2"> <i class="fas fa-arrow-left"></i> </a>

                        <button type="submit" class="btn float-right btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>