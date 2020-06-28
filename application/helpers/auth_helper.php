<?php 

function is_logged_in(){
    $bee = get_instance();
    if(!$bee->session->userdata('email')){
        redirect('auth');
    }else{
        $role_id = $bee->session->userdata('role_id');
        $menu = $bee->uri->segment(1);


        $queryMenu = $bee->db->get_where('menu', ['url' => $menu])->row_array();

        $menu_id = $queryMenu['menu_id'];

        $menu_role = $bee->db->get_where('menu_role', 
                    [
                        'menu_id'=> $menu_id, 
                        'role_id' => $role_id
                    ]);
        
        if($menu_role->num_rows() < 1){
            redirect("auth/blocked_access");
        }

    }
}