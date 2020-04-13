<?php


class Supplier extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SupplierMasterModel','supplier');
	}

	public function index()
	{
		if($get = $this->input->get()){
			$this->supplier->db->where($get);
		}
		echo json_encode(array(
			'data'	=> $this->supplier->all()
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->supplier->find(array(
				'SMCode'	=> $code
			))
		));
	}

	public function delete($code)
	{
		$this->supplier->delete(array(
			'SMCode'	=> $code
		));
		echo json_encode(array(
			'data'	=> $code
		));
	}
}
