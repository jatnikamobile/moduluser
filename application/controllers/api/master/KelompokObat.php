<?php
class KelompokObat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('KelompokObatModel','kelompok');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->kelompok->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			if(!$post['KdKelompok']){
				$this->kelompok->insert(array(
					'NmKelompok'	=> $post['NmKelompok'],
					'ValidUser'	=> $this->session->userdata('username')
				));
				$post['ValidUser'] = $this->session->userdata('username') .' '.date('Y-m-d H:i:s');
			}else{
				$post['ValidUser']	= $this->session->userdata('username') .' '.date('Y-m-d H:i:s');
				$this->kelompok->update(array(
					'NmKelompok'	=> $post['NmKelompok'],
				), array(
					'KdKelompok'	=> $post['KdKelompok']
				));
			}
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
			$this->kelompok->db->where($get);
		}
		$groups = $this->kelompok->all();
		echo json_encode(array(
			'data'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->kelompok->find(array(
					'KdKelompok'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->kelompok->delete(array(
					'KdKelompok'	=> $code
				))
		));
	}
}
