<?php
class KategoriObat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriObatModel','kategori');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->kategori->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			if(!$post['KdKategori']){
				$code = 01;
				$this->kategori->db->order_by('KdKategori','DESC');
				if($kategori = $this->kategori->all()){
					$lastCode =  (int) $kategori[0]->KdKategori;
					$code = zero_fill($lastCode+1, 2);
				}
				$this->kategori->insert(array(
					'KdKategori'	=> $code,
					'NmKategori'	=> $post['NmKategori'],
					'ValidUser'	=> $this->session->userdata('username').' '.date('Y-m-d H:i:s')
				));
				$post['ValidUser'] = $this->session->userdata('username') .' '.date('Y-m-d H:i:s');
				$post['KdKategori'] = $code;
			}else{
				$post['ValidUser']	= $this->session->userdata('username') .' '.date('Y-m-d H:i:s');
				$this->kategori->update($post, array(
					'KdKategori'	=> $post['KdKategori']
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
			$this->kategori->db->where($get);
		}
		$groups = $this->kategori->all();
		echo json_encode(array(
			'data'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->kategori->find(array(
					'KdKategori'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->kategori->delete(array(
					'KdKategori'	=> $code
				))
		));
	}
}
