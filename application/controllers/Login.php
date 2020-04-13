<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'um');
	}

	public function index()
	{
		if($this->input->post()){
			$this->cek_login();
		}
		$this->load->view('login/index');
	}

	function cek_login(){
		$resp['stat'] = false;
		$uname = strtoupper($this->input->post('username'));
		$pass = strtoupper($this->input->post('password'));
		$shift = strtoupper($this->input->post('shift'));
		if($cek_up = $this->um->auth($uname,$pass, $shift)){
			redirect('otoritas/user');
		}else{
			redirect('login?status=false');
		}

	}

	public function new_cek_login(){

		$resp['stat'] = false;
		$uname = strtoupper($this->input->post('uname'));
		$pass = strtoupper($this->input->post('pass'));
		$shift = strtoupper($this->input->post('shift'));
		$cek_up = $this->um->check_login($uname,$pass);
		$resp[] = $cek_up;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
