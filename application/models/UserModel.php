<?php

require_once 'Model.php';
class UserModel extends Model {
	public $table = 'DBpassDepo';

	public function auth($name, $password, $shift)
	{
		$query = $this->db->select('*')->from($this->table)->where('NamaUser', strtoupper($name))->where('Password', strtoupper($password))->get();
		if($query->num_rows()){
			$cek_up = $query->row();
			$this->session->set_userdata(array(
				'logged_in'	=> true,
				'username'		=> $cek_up->NamaUser,
				'akses_level'	=> $cek_up->oLevel,
				'id_user'		=> $cek_up->NamaUser,
				'kd_depo'		=> $cek_up->KdDepo,
				'o_level'		=> $cek_up->oLevel,
				'shift'			=> $shift,
			));
			return true;
		}
		return false;
	}

	public function logged_in()
	{
		if($this->session->userdata('logged_in')){
			return true;
		}
		return false;
	}
}
