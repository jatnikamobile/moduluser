<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'middleware/Authentication.php';
class Dashboard extends Authentication {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DoctorModel','doctor');
	}



	public function index()
	{
		echo 'dashboard';
//		$this->load->view('layout/header');
//		$this->load->view('doctors/index', array(
//			'doctors'	=> $this->doctor->all(),
//		));
//		$this->load->view('layout/footer',array(
//			'js'	=> 'doctors'
//		));
	}

}
