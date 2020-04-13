<?php
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DBPassUserModel','user');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->user->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			$namauser = strtoupper(str_replace(' ','_', $post['NamaUser']));
			$olevel = $post['oLevel'];
			$kddepo = $post['KdPoli'];
			$password = $post['Password'];
			if($this->user->find(array(
				'NamaUser'	=> $namauser
			))){
				$this->user->update(array(
					'oLevel'	=> $olevel,
					'NamaUser'	=> $namauser,
					'KdPoli'	=> $kddepo,
					'Password'	=> $password
				), array(
					'NamaUser'	=> $namauser,
				));
			}else{
				$this->user->insert(array(
					'oLevel'	=> $olevel,
					'NamaUser'	=> $namauser,
					'KdPoli'	=> $kddepo,
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
			$this->user->db->where($get);
		}
		$groups = $this->user->all();
		echo json_encode(array(
			'data'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->user->find(array(
				'NamaUser'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->user->delete(array(
					'NamaUser'	=> $code
				))
		));
	}
}
