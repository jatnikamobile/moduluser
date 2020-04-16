<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/middleware/Authentication.php';
class Poliklinik extends Authentication {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PolittpModel','poli');
	}



	public function index()
	{
		$this->load->view('layout/header');
		$this->poli->db->join('TBLTpengobatan','TBLTpengobatan.KDTuju = POLItpp.KdTuju');
		$this->load->view('poli/index', array(
			'polis'	=> $this->poli->all(),
			'tujus'	=> $this->poli->db->get('TBLTpengobatan')->result()
		));
		$this->load->view('layout/footer',array(
			'js'	=> 'poli'
		));
	}
}
