<div class="container my-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">

                    <!-- Button -->
                    <h5 class="text-center mb-3"><i class="fas fa-fw fa-bars"></i> MANAGEMENT MENU <?= $about_us['name_school']; ?></h5>

                    <a href="<?= base_url();  ?>managemen_menu/v_menu" class="btn  btn-block  text-white text-left btn-primary mb-2 "> <i class="fas fa-fw fa-bars"></i>  Menu</a> 

                    <br>

                    <a href="<?= base_url();  ?>managemen_menu/v_role" class="btn  btn-block text-white btn-primary text-left  mb-2 "> <i class="fas fa-fw fa-user-check"></i> Role</a>

                    <br>
                    
                    <a href="<?= base_url();  ?>managemen_menu/v_access_menu" class="btn btn-block text-white btn-primary text-left  mb-2 "> <i class="fab fa-fw fa-accessible-icon"></i> Akses Menu</a>

                
                </div>
            </div>
        </div>
    </div>
</div>