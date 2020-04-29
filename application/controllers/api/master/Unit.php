<?php
class Unit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MasterUnitModel','unit');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->unit->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			$id = $post['id'];
			if(!$id){
				$do = $this->unit->insert(array(
					'UnitName'	=> $post['UnitName']
				));
			}else{
				$do = $this->unit->update(array(
					'UnitName'	=> $post['UnitName']
				), array(
					'id'	=> $id,
				));
			}

			if($do){
				echo json_encode(array(
					'data'	=> $post,
				));
			}else{
				echo json_encode(array(
					'data'	=> false,
				));
			}
		}else{
			echo json_encode(array(
				'data'	=> false,
			));
		}
	}

	public function index()
	{
		if($get = $this->input->get()){
			$this->unit->db->where($get);
		}
		$groups = $this->unit->all();
		echo json_encode(array(
			'data'	=> $groups
		));
	}

	public function show($id)
	{
		echo json_encode(array(
			'data'	=> $this->unit->find(array(
					'id'	=> $id
				))
		));
	}

	public function delete($id)
	{
		echo json_encode(array(
			'data'	=> $this->unit->delete(array(
					'id'	=> $id
				))
		));
	}
}
