<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eror_404 extends CI_Controller {

	public function index()
	{
		$this->load->view('errors/error_404');
	}
}
