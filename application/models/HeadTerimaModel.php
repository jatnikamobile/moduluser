<?php

require_once 'Model.php';
class HeadTerimaModel extends Model
{
	public $table = 'HeadTerima';

	public function views($data = 1, $nobpb = null)
	{
		return $this->db->query("exec sp_ViewTerimaOrder_FARxhos 
		@cnobpb = '$nobpb',
		@cnopo = '',
		@cnodo = '',
		@cnama = '',
		@ctanggal = '',
		@sdata = '$data'
		")->result();
	}
}
