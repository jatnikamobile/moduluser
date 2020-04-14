<?php
class Bangsal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BangsalModel','bangsal');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->bangsal->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			$kdbangsal = $post['KdBangsal'];
			$nmbangsal = $post['NmBangsal'];
			$kapasitas = $post['Kapasitas'];
			$valid = $this->session->userdata('username');
			$this->bangsal->db->query("sp_AddBangsal_MASxhos
      		@kdbangsal = '$kdbangsal',
      		@nmbangsal = '$nmbangsal',
      		@kapasitas = '$kapasitas',
			@validuser = '$valid',
			@regcode = ''");
			echo json_encode(array(
				'data'	=> $post,
			));
		}else{
			echo json_encode(array(
				'data'	=> false,
			));
		}
	}

	public function index()
	{
		if($get = $this->input->get()){
			$this->bangsal->db->where($get);
		}
		$groups = $this->bangsal->all();
		echo json_encode(array(
			'KdBangsal'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->bangsal->find(array(
					'KdBangsal'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->bangsal->delete(array(
					'KdBangsal'	=> $code
				))
		));
	}
}
