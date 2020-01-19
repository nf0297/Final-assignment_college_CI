<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sproduk_m extends CI_Model {

	public function get($id = null)
	{	
		$this->db->select('*');
		$this->db->from('produk');
		if($id != null) {
			$this->db->where('id_produk', $id); 
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['id_produk'] = $post['produkid'];
		$params['deskripsi_produk'] = $post['produkdesk'];
		$this->db->insert('produk', $params);
	}

	public function edit($post)
	{
		$params['id_produk'] = $post['produkid'];
		$params['deskripsi_produk'] = $post['produkdesk'];
		$this->db->where('id_produk', $post['produkid']);
		$this->db->update('produk', $params);
	}

	public function del($id)
	{
		$this->db->where('id_produk', $id);
		$this->db->delete('produk');
	}

	public function kode(){
        $q = $this->db->query("select total_waktu_proses from produk");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "PRD-".$code;
    }
}
