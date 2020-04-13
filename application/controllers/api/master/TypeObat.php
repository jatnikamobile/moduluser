<?php
class TypeObat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TypeModel','type');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->type->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			if(!$post['KdType']){
				$code = 01;
				$this->type->db->order_by('KdType','DESC');
				if($type = $this->type->all()){
					$lastCode =  (int) $type[0]->KdType;
					$code = zero_fill($lastCode+1, 2);
				}
				$this->type->insert(array(
					'KdType'	=> $code,
					'NmType'	=> $post['NmType'],
					'ValidUser'	=> $this->session->userdata('username').' '.date('Y-m-d H:i:s')
				));
				$post['ValidUser'] = $this->session->userdata('username') .' '.date('Y-m-d H:i:s');
				$post['KdType'] = $code;
			}else{
				$post['ValidUser']	= $this->session->userdata('username') .' '.date('Y-m-d H:i:s');
				$this->type->update($post, array(
					'KdType'	=> $post['KdType']
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
			$this->type->db->where($get);
		}
		$groups = $this->type->all();
		echo json_encode(array(
			'data'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->type->find(array(
					'KdType'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->type->delete(array(
					'KdType'	=> $code
				))
		));
	}
}
