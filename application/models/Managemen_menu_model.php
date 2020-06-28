<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managemen_menu_model extends CI_Model {

    // Menampilkan Menu
    public function getMenu(){
        return $this->db->get("menu")->result();
    }

    // Menampilkan Role
    public function getRole(){
        return $this->db->get("role")->result();
    }

    // Tambah Menu
    public function insertMenu($data){
        return $this->db->insert("menu", $data);
    }


    // Tambah Role
    public function insertRole($data){
        return $this->db->insert("role", $data);
    }

    // Tambah Menu Role
    public function insertMenuRole($data){
        return $this->db->insert("menu_role", $data);
    }

    // Menampilkan Menu dan role 
    public function getMenuRole(){
        $this->db->select('*,  menu_role.id as id_menu_role');
        $this->db->from('menu_role');
        $this->db->join('menu', 'menu.menu_id = menu_role.menu_id');
        $this->db->join('role', 'role.role_id = menu_role.role_id');

        return $this->db->get()->result();
    }


    // Tampilkan Menu PerItem
    public function getMenuItem($id){
        return $this->db->get_where("menu", ['id' => $id]);
    }


    // Tampilkan Role PerItem
    public function getMenuRoleItem($id){
        $this->db->select('*, menu_role.menu_id as id_menu, menu_role.role_id as id_role, menu_role.id as id_menu_role');
        $this->db->from('menu_role');
        $this->db->join('menu', 'menu.menu_id = menu_role.menu_id','left');
        $this->db->join('role', 'role.role_id = menu_role.role_id','left');
        $this->db->where("menu_role.id", $id );
        return $this->db->get()->row();
    }


    // Update Menu PerItem
    public function updateMenu( $data ,$id){
        $this->db->where("id", $id);
        return $this->db->update("menu", $data);
    }

    
    // Update Menu Role PerItem
    public function updateMenuRole( $data ,$id){
        $this->db->where("id", $id);
        return $this->db->update("menu_role", $data);
    }


    // Update Menu PerItem
    public function deleteMenu($id){
        $this->db->where("id", $id);
        return $this->db->delete("menu");
    }

    public function checkRole($user){
       return $this->db->get_where("menu_role", ['role_id' => $user])->result_array();
    }
}
