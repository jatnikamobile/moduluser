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
			if (!empty($_FILES["Pict"])) {
				$title =$post['KdDoc'];
				$target_dir = "./assets/images";
				// $target_dir = "D:/ttd_dokter/";
				$target_file = $target_dir . basename($_FILES["Pict"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$check = getimagesize($_FILES["Pict"]["tmp_name"]);
				if(isset($_POST["submit"])) {
				    $check = getimagesize($_FILES["Pict"]["tmp_name"]);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        echo "File is not an image.";
				        $uploadOk = 0;
				    }
				}

				if (file_exists($target_file)) {
				    echo "Sorry, file already exists.";
				    $uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "pdf" ) {
				    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["Pict"]["tmp_name"], $target_dir.$title.'.'.$imageFileType)) {
				       $data_upload = array('filename' => $title.'.'.$imageFileType, 'keterangan_file' =>$title);
				    } else {
				        $data_upload = array('filename' => '', 'keterangan_file' =>'gagal');
				    }
				}
				redirect('hasilpemeriksaan/form_photo/'.$title['title']);
				
			}

			$result = $this->doctor->db->query("
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
				@file_ttd = '".$data_upload['filename']."',
				@file_stat = '".$data_upload['keterangan_file']."',
				@regcode = ''
			");
			if($result){
				redirect('Doctors');
			}else{
				echo json_encode(array(
					'data'	=> $post,
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
