<?php

require_once 'Model.php';
class MasterObatModel extends Model {
	public $table = 'MasterObat';

	public function views($kodeobat = null, $namaobat = null, $sdata = 1, $many = true)
	{
		$query = $this->db->query("stpn_ViewMasterObat_FARxhos
			@ckodeobat = '$kodeobat',
			@cnamaobat = '$namaobat',
			@sdata = '$sdata'
		");
		if($many){
			return $query->result();
		}else{
			return $query->row();
		}
	}

}
