<?php
class Obat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MasterObatModel','obat');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->obat->views(null, null, 1, true)
		));

	}

	public function index()
	{
		if($get = $this->input->get()){
			$this->obat->db->where($get);
		}
		$this->obat->db->join('FHarga', 'Fharga.KdObat = '.$this->obat->table.'.KdObat');
		$obats = $this->obat->all();
		echo json_encode(array(
			'data'	=> $obats
		));
	}

	public function search()
	{
		$this->obat->db->join('FHarga', 'FHarga.KdObat = MasterObat.KdObat');
		if($this->input->get('NmObat')){
			$obat = $this->obat->find(array('MasterObat.NmObat' => $this->input->get('NmObat')));
		}elseif($this->input->get('KdObat')){
			$obat = $this->obat->find(array('.MasterObat.KdObat' => $this->input->get('KdObat')));
		}
		$obatData3 = $this->obat->db->query("exec sp_ViewMasterObat_FARxhos @ckodeobat = '$obat->KdObat', @cnamaobat='$obat->NmObat', @sdata = '3'")->row();
		$obat->hrgbeli = $obatData3->hrgbeli;
		if($obat->discount == null){
			$obat->discount = 0;
		}
		echo json_encode(array(
			'data'	=> $obat,
			'data2'	=> $obatData3
		));
	}

	public function delete()
	{
		if($post = $this->input->post()){
			$kdobat = $post['kdobat'];
			$delete = $this->obat->db->query("sp_DeleteMasterObat_FARxhos @kdobat = '{$kdobat}', @cvaliduser = ''");
			echo json_encode(array(
				'message'	=> $kdobat.'deleted success'
			));
		}else{
			echo json_encode(array(
				'message'	=> 'bad request'
			));
		}
	}
}
