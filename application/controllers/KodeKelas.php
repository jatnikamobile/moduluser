<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/middleware/Authentication.php';
class KodeKelas extends Authentication {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KodeKelasModel','kode');
	}



	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('kodekelas/index', array(
			'kodes'	=> $this->kode->all(),
		));
		$this->load->view('layout/footer',array(
			'js'	=> 'kodekelas'
		));
	}
}
