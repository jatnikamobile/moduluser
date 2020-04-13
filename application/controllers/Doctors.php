<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'middleware/Authentication.php';
class Doctors extends Authentication {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DoctorModel','doctor');
	}



	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('doctors/index', array(
			'doctors'	=> $this->doctor->all(),
		));
		$this->load->view('layout/footer',array(
			'js'	=> 'doctors'
		));
	}

	public function form($KdDoc = null)
	{
		$this->load->view('layout/header');
		$this->load->view('doctors/form', array(
			'genders'	=> array(
				'Laki-laki','Perempuan'
			),
			'categories'	=> array(
				'Specialis', 'Umum','Gigi'
			),
			'KdDoc'	=> $KdDoc,
			'polis'	=> $this->doctor->db->query('select * from POLItpp')->result()
		));
		$this->load->view('layout/footer',array(
			'js'	=> 'doctors'
		));
	}
}
