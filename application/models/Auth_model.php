<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {


	public function insertUser($data)
	{
		return $this->db->insert('user', $data);
	}
}
