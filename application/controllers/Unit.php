<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/middleware/Authentication.php';
class Unit extends Authentication {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MasterUnitModel','unit');
	}



	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('unit/index', array(
			'units'	=> $this->unit->all(),
		));
		$this->load->view('layout/footer',array(
			'js'	=> 'unit'
		));
	}
}
