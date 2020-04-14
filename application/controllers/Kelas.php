<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/middleware/Authentication.php';
class Kelas extends Authentication {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KelasModel','kelas');
	}



	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('kelas/index', array(
			'kelases'	=> $this->kelas->all(),
		));
		$this->load->view('layout/footer',array(
			'js'	=> 'kelas'
		));
	}
}
