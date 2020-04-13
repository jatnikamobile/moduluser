<?php
class Depo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DBPassDepoModel','depo');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->depo->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			$namauser = strtoupper(str_replace(' ','_', $post['NamaUser']));
			$olevel = $post['oLevel'];
			$kddepo = $post['KdDepo'];
			$password = $post['Password'];
			if($this->depo->find(array(
				'NamaUser'	=> $namauser
			))){
				$this->depo->update(array(
					'oLevel'	=> $olevel,
					'NamaUser'	=> $namauser,
					'KdDepo'	=> $kddepo,
					'Password'	=> $password
				), array(
					'NamaUser'	=> $namauser,
				));
			}else{
				$this->depo->insert(array(
					'oLevel'	=> $olevel,
					'NamaUser'	=> $namauser,
					'KdDepo'	=> $kddepo,
					'Password'	=> $password
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
			$this->depo->db->where($get);
		}
		$groups = $this->depo->all();
		echo json_encode(array(
			'data'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->depo->find(array(
				'NamaUser'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->depo->delete(array(
					'NamaUser'	=> $code
				))
		));
	}
}
