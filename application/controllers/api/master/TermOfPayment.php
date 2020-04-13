<?php
class TermOfPayment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TermOfPaymentModel','term');
	}

	public function views()
	{
		echo json_encode(array(
			'data'	=>	$this->term->all(),
		));
	}

	public function form()
	{
		if($post = $this->input->post()){
			if(!$post['TOPCode']){
				$code = strtoupper($post['TOPDescription'][0].$post['TOPDescription'][1].$post['TOPDescription'][2]);
				if($code == 'TOP'){
					$code = 'T'.$post['TOPDays'];
				}
				if($post['TOPDescription'])
				$this->term->insert(array(
					'TOPCode'	=> $code,
					'TOPDescription'	=> $post['TOPDescription'],
					'TOPDays'	=> $post['TOPDays'],
					'ValidUser'	=> $this->session->userdata('username').' '.date('Y-m-d H:i:s')
				));
				$post['ValidUser'] = $this->session->userdata('username') .' '.date('Y-m-d H:i:s');
				$post['TOPCode'] = $code;
			}else{
				$post['ValidUser']	= $this->session->userdata('username') .' '.date('Y-m-d H:i:s');
				$this->term->update($post, array(
					'TOPCode'	=> $post['TOPCode']
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
			$this->term->db->where($get);
		}
		$groups = $this->term->all();
		echo json_encode(array(
			'data'	=> $groups
		));
	}

	public function show($code)
	{
		echo json_encode(array(
			'data'	=> $this->term->find(array(
					'TOPCode'	=> $code
				))
		));
	}

	public function delete($code)
	{
		echo json_encode(array(
			'data'	=> $this->term->delete(array(
					'TOPCode'	=> $code
				))
		));
	}
}
