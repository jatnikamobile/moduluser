<?php
class JenisObat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('JenisObatModel','jenisobat');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->jenisobat->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			if(!$post['JenisCode']){
				$code = 01;
				$this->jenisobat->db->order_by('JenisCode','DESC');
				if($jenis = $this->jenisobat->all()){
					$lastCode =  (int) $jenis[0]->JenisCode;
					$code = zero_fill($lastCode+1, 2);
				}
				$this->jenisobat->insert(array(
					'JenisCode'	=> $code,
					'JenisName'	=> $post['JenisName'],
					'ValidUser'	=> $this->session->userdata('username') .' '.date('Y-m-d H:i:s')
				));
				$post['ValidUser'] = $this->session->userdata('username') .' '.date('Y-m-d H:i:s');
				$post['JenisCode'] = $code;
			}else{
				$post['ValidUser']	= $this->session->userdata('username') .' '.date('Y-m-d H:i:s');
				$this->jenisobat->update($post, array(
					'JenisCode'	=> $post['JenisCode']
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
			$this->jenisobat->db->where($get);
		}
		$groups = $this->jenisobat->all();
		echo json_encode(array(
			'data'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->jenisobat->find(array(
					'JenisCode'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->jenisobat->delete(array(
					'JenisCode'	=> $code
				))
		));
	}
}
