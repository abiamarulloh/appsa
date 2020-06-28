<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url("assets/sbadmin2/img/about/") . $about_us['image']; ?>" alt="" width="40px" class="bg-white rounded">
        </div>
        <div class="sidebar-brand-text mx-3">APPSA <br> <sub><?= $about_us['name_school']; ?></sub> </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php 
        $this->db->select('*');
        $this->db->from('menu_role');
        $this->db->join('menu', 'menu.menu_id = menu_role.menu_id');
        $this->db->join('role', 'role.role_id = menu_role.role_id');

        $query = $this->db->get()->result_array();
      ?>

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <?php foreach($query as $qy) : ?>

    <?php if( $qy['role_id'] == $user['role_id']) : ?>
    <!-- Nav Item - Murid -->
    <?php if($title == $qy['nama_menu']): ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url() . $qy['url'] ; ?>">
            <i class="<?= $qy['icon']; ?>"></i>
            <span><?= $qy['nama_menu']; ?></span>
            <?php if( $qy['nama_menu'] == "Poin prestasi"  ) : ?>
            <!-- <span class="badge badge-primary">New </span>  -->
            <?php endif; ?>
        </a>
    </li>
    <?php endif; ?>
    <?php endforeach; ?>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->