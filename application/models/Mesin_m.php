<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin_m extends CI_Model {

	public function get($id = null)
	{	
		$this->db->select('*');
		$this->db->from('mesin');
		if($id != null) {
			$this->db->where('nomor', $id); 
		}
		$query = $this->db->get();
		return $query;
	}

	public function getm($id = null)
	{	
		$this->db->select('*');
		$this->db->from('mesin');
		if($id != null) {
			$this->db->where('id_mesin', $id); 
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['id_mesin'] = $post['machinecode'];
		$params['nama_mesin'] = $post['machinename'];
		$params['jumlah_mesin'] = $post['machineqty'];
		$this->db->insert('mesin', $params);
	}

	public function edit($post)
	{
		$params['id_mesin'] = $post['machinecode'];
		$params['nama_mesin'] = $post['machinename'];
		$params['jumlah_mesin'] = $post['machineqty'];
		$this->db->where('nomor', $post['number']);
		$this->db->update('mesin', $params);
	}
	
	public function del($id)
	{
		$this->db->where('nomor', $id);
		$this->db->delete('mesin');
	}
}
