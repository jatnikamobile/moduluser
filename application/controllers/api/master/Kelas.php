<?php
class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('KelasModel','kelas');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->kelas->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			$kdkelas = $post['KDKelas'];
			$nmkelas = $post['NMKelas'];
			if(!$kdkelas){
				$this->kelas->db->order_by('KDKelas','DESC');
				if($groups = $this->kelas->all()){
					$lastCode =  (int) $groups[0]->KDKelas;
					$kdkelas = zero_fill($lastCode+1, 2);
				}
				$post['KDKelas'] = $kdkelas;
				$post['ValidUser'] = $this->session->userdata('username');
				$this->kelas->insert($post);
			}else{
				$this->kelas->update($post, array(
					'KDKelas'	=> $kdkelas
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
			$this->kelas->db->where($get);
		}
		$groups = $this->kelas->all();
		echo json_encode(array(
			'KDKelas'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->kelas->find(array(
					'KDKelas'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->kelas->delete(array(
					'KDKelas'	=> $code
				))
		));
	}
}
