<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('username', $post['username']); 
		/*username awal diambil dari database, sedangkan username dalam post diambil dari name pada view_login*/
		$this->db->where('password', sha1($post['password']));
		/*sama kaya penjelasan dari username diatas*/
		$query = $this->db->get();
		return $query;
	}

	public function get($id = null)
	{	
		$this->db->select('*');
		$this->db->from('pengguna');
		if($id != null) {
			$this->db->where('id_pengguna', $id); 
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['nama_lengkap'] = $post['fullname'];
		$params['username'] = $post['username'];
		$params['password'] = sha1($post['password']);
		$params['level'] = $post['level'];
		/*data dalam params sesuai dengan field pada table, sedangkan dalam post yaitu dari nama di html */
		$this->db->insert('pengguna', $params);
	}

	public function edit($post)
	{
		$params['nama_lengkap'] = $post['fullname'];
		$params['username'] = $post['username'];
		if(!empty($post['password'])) {
		$params['password'] = sha1($post['password']);	
		}
		$params['level'] = $post['level'];
		$this->db->where('id_pengguna', $post['id_pengguna']);
		$this->db->update('pengguna', $params);
	}
	
	public function del($id)
	{
		$this->db->where('id_pengguna', $id);
		$this->db->delete('pengguna');
	}
}
