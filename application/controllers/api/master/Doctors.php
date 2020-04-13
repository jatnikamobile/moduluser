<?php
class Doctors extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DoctorModel','doctor');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->doctor->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			$code = $post['KdDoc'];
			$nama = $post['NmDoc'];
			$kategori = $post['Kategori'];
			$spesialis = $post['Spesialis'];
			$sex = $post['Sex'];
			$address = $post['Address'];
			$city = $post['City'];
			$kdpos = $post['kdPos'];
			$phone = $post['Phone'];
			$kdpoli = $post['KdPoli'];
			$nmnpoli = $this->doctor->db->where('POLItpp.KDPoli', $kdpoli)->get('POLItpp')->row()->NMPoli;
			$valid = $this->session->userdata('username');
			$this->doctor->db->query("
				sp_AddDokter_MASxhos
      			@kddoc = '$code',
      			@nmdoc = '$nama',
      			@kategori = '$kategori',
				@spesialis = '$spesialis',
				@sex = '$sex',
				@address = '$address',
				@city = '$city',
				@kdpos = '$kdpos',
				@phone = '$phone',
				@kdpoli  = '$kdpoli',
				@nmpoli = '$nmnpoli',
				@validuser = '$valid',
				@regcode = ''
			");
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
			$this->doctor->db->where($get);
		}
		$doctor = $this->doctor->all();
		echo json_encode(array(
			'data'	=> $doctor
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->doctor->find(array(
					'KdDoc'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->doctor->delete(array(
					'KdDoc'	=> $code
				))
		));
	}
}
