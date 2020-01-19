<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjadwalan_m extends CI_Model {

	public function get($id = null)
	{	
		$this->db->select('*');
		$this->db->from('detail_produk');
		if($id != null) {
			$this->db->where('id_produk', $id); 
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['no_produk'] = $post['tipep'];
		$params['deskripsi_produk'] = $post['namap'];
		$params['mesin_proses'] = $post['mesinprs'];
		$params['urutan_proses'] = $post['urutanprs'];
		$params['waktu_proses'] = $post['waktuprs'];
		$this->db->insert('produk', $params);
	}

	public function edit($post)
	{
		$params['no_produk'] = $post['tipep'];
		$params['deskripsi_produk'] = $post['namap'];
		$params['mesin_proses'] = $post['mesinprs'];
		$params['urutan_proses'] = $post['urutanprs'];
		$params['waktu_proses'] = $post['waktuprs'];
		$this->db->where('id_produk', $post['produk_id']);
		$this->db->update('produk', $params);
		
		
	}
	
	public function del($id)
	{
		$this->db->where('id_produk', $id);
		$this->db->delete('mesin');
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
