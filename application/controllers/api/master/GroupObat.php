<?php
class GroupObat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('GroupObatModel','group');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->group->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			if(!$post['GroupCode']){
				$code = 01;
				$this->group->db->order_by('GroupCode','DESC');
				if($groups = $this->group->all()){
					$lastCode =  (int) $groups[0]->GroupCode;
					$code = zero_fill($lastCode+1, 2);
				}
				$this->group->insert(array(
					'GroupCode'	=> $code,
					'GroupName'	=> $post['GroupName'],
					'ValidUser'	=> $this->session->userdata('username').' '.date('Y-m-d H:i:s')
				));
				$post['ValidUser'] = $this->session->userdata('username').' '.date('Y-m-d H:i:s');
				$post['GroupCode'] = $code;
			}else{
				$post['ValidUser']	= $this->session->userdata('username').' '.date('Y-m-d H:i:s');
				$this->group->update($post, array(
					'GroupCode'	=> $post['GroupCode']
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
			$this->group->db->where($get);
		}
		$groups = $this->group->all();
		echo json_encode(array(
			'data'	=> $groups
		));
	}

	public function show($GroupCode)
	{
		echo json_encode(array(
			'data'	=> $this->group->find(array(
					'GroupCode'	=> $GroupCode
				))
		));
	}

	public function delete($GroupCode)
	{
		echo json_encode(array(
			'data'	=> $this->group->delete(array(
					'GroupCode'	=> $GroupCode
				))
		));
	}
}
