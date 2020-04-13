<?php
class Rawat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DBPassRawatModel','rawat');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->rawat->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			$namauser = strtoupper(str_replace(' ','_', $post['NamaUser']));
			$olevel = $post['oLevel'];
			$KdBangsal = $post['KdBangsal'];
			$password = $post['Password'];
			if($this->rawat->find(array(
				'NamaUser'	=> $namauser
			))){
				$this->rawat->update(array(
					'oLevel'	=> $olevel,
					'NamaUser'	=> $namauser,
					'KdBangsal'	=> $KdBangsal,
					'Password'	=> $password
				), array(
					'NamaUser'	=> $namauser,
				));
			}else{
				$this->rawat->insert(array(
					'oLevel'	=> $olevel,
					'NamaUser'	=> $namauser,
					'KdBangsal'	=> $KdBangsal,
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
			$this->rawat->db->where($get);
		}
		$groups = $this->rawat->all();
		echo json_encode(array(
			'data'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->rawat->find(array(
				'NamaDepo'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->rawat->delete(array(
					'NamaDepo'	=> $code
				))
		));
	}
}
