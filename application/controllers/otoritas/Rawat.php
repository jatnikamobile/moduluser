<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/middleware/Authentication.php';
class Rawat extends Authentication {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DBpassRawatModel','rawat');
	}



	public function index()
	{
		$this->load->view('layout/header');
		$this->rawat->db->join('TBLBangsal','TBLBangsal.KdBangsal = DBPassIRNA.KdBangsal');
		$this->load->view('otoritas/rawat/index', array(
			'rawats'	=> $this->rawat->all(),
			'masterpolis'	=> $this->rawat->db->get('TBLBangsal')->result()
		));
		$this->load->view('layout/footer',array(
			'js'	=> 'otoritas/rawat'
		));
	}
}
