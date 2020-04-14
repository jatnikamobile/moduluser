<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/middleware/Authentication.php';
class Bangsal extends Authentication {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BangsalModel','bangsal');
	}



	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('bangsal/index', array(
			'bangsals'	=> $this->bangsal->all(),
		));
		$this->load->view('layout/footer',array(
			'js'	=> 'bangsal'
		));
	}
}
