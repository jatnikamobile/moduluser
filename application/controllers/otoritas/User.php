<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/middleware/Authentication.php';
class User extends Authentication {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DBPassUserModel','user');
	}



	public function index()
	{
		$this->load->view('layout/header');
		$this->user->db->join('POLItpp','POLItpp.KDPoli = DBPass.KdPoli');
		$this->load->view('otoritas/user/index', array(
			'rawats'	=> $this->user->all(),
			'masterpolis'	=> $this->user->db->get('POLItpp')->result()
		));
		$this->load->view('layout/footer',array(
			'js'	=> 'otoritas/user'
		));
	}
}
