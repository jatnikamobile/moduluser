<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/middleware/Authentication.php';
class Depo extends Authentication {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DBPassDepoModel','depo');
	}



	public function index()
	{
		$this->load->view('layout/header');
		$this->depo->db->join('TBLDepo','TBLDepo.KdDepo = DBPassDepo.KdDepo');
		$this->load->view('otoritas/depo/index', array(
			'depos'	=> $this->depo->all(),
			'masterdepos'	=> $this->depo->db->get('TBLDepo')->result()
		));
		$this->load->view('layout/footer',array(
			'js'	=> 'otoritas/depo'
		));
	}
}
