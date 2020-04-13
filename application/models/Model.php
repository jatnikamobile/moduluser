<?php

class Model extends CI_Model {
	public $table;

	public function all()
	{
		return $this->db->select('*')->from($this->table)->get()->result();
	}

	public function allArray()
	{
		return $this->db->get($this->table)->result_array();
	}

	public function find($id)
	{
		if(is_array($id)){
			$this->db->where($id);
		}
		return $this->db->get($this->table)->row();
	}

	public function findWhere(array $array)
	{
		$this->db->where($array);
		return $this->db->get($this->table)->result();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, array $array)
	{
		$this->db->where($array);
		return $this->db->update($this->table, $data);
	}

	public function delete(array $where)
	{
		$this->db->delete($this->table,$where);
		//DELETE FROM tbl_user WHERE id = $id
	}

	public function one()
	{
		return $this->db->get($this->table)->row();
	}




}
