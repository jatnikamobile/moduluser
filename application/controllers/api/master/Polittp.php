<?php
class Polittp extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PolittpModel','poli');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->poli->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			if($post['KDPoli']){
				$this->poli->update($post,array(
					'KDPoli'	=> $post['KDPoli']
				));
			}else{
				$this->poli->db->order_by('KDPoli','DESC');
				$polis = $this->poli->all();
				if(!$polis){
					$polis = 0;
				}else{
					$polis = (int) $polis[0]->KDPoli ;
				}
				$kode = $polis + 1;
				$post['KDPoli'] = $kode;
				$this->poli->insert($post);
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
			$this->poli->db->where($get);
		}
		$groups = $this->poli->all();
		echo json_encode(array(
			'data'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->poli->find(array(
					'KDPoli'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->poli->delete(array(
					'KDPoli'	=> $code
				))
		));
	}
}
