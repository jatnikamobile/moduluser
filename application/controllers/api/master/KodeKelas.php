<?php
class KodeKelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('KodeKelasModel','kelas');
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
			$kode = $post['Kode'];
			$keterangan = $post['Keterangan'];
			$valid = $this->session->userdata('username');
			if(!$kode){
				$this->kelas->db->order_by('Kode','DESC');
				if($groups = $this->kelas->all()){
					$lastCode =  (int) $groups[0]->Kode;
					$kode = $lastCode+1;
				}
				$post['Kode']	= $kode;

				var_dump($lastCode);
				exit;
				$this->kelas->insert($post);
			}else{
				$this->kelas->update($post, array(
					'Kode'	=> $post['Kode']
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
			'Kode'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->kelas->find(array(
					'Kode'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->kelas->delete(array(
					'Kode'	=> $code
				))
		));
	}
}
