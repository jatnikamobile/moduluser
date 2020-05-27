<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/middleware/Authentication.php';
class KelasPerawat extends Authentication {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KelasModel','kelas');
		$this->load->model('KodeKelasModel','kodekelas');
	}



	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('kelasrawat/index', array(
			'kelases'	=> $this->kelas->all(),
			'kodekelases'	=> $this->kodekelas->all(),
			'ruangrawats'	=> $this->kelas->db->get('TBLBangsal')->result(),
		));
		$this->load->view('layout/footer',array(
			'js'	=> 'kelas'
		));
	}
}
