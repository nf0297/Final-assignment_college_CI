<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dproduk_m extends CI_Model {

	public $table = 'detail_produk';
	public $id = 'id';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	public function get($id = null)
	{	
		$this->db->select('*');
		$this->db->from('detail_produk');
		if($id != null) {
			$this->db->where('id', $id); 
		}
		$query = $this->db->get();
		return $query;
	}


	public function getp($id = null)
	{	
		$this->db->select('*');
		$this->db->from('detail_produk');
		if($id != null) {
			$this->db->where('id_produk', $id); 
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_by_proses($proses)
	{
		$this->db->where('urutan_proses', $proses);
		return $this->db->get($this->table)->result();
	}

	public function get_next_proses($id_produk, $proses)
	{
		$this->db->where('id_produk', $id_produk);
		$this->db->where('urutan_proses', $proses);
		return $this->db->get($this->table)->row();
	}

	//get total rows 
	function total_rows($q = NULL) 
	{
		$this->db->like('id', $q);
		$this->db->or_like('id_produk', $q);
		$this->db->or_like('id_mesin', $q);
		$this->db->or_like('urutan_proses', $q);
		$this->db->or_like('t_proses', $q);
		$this->db->or_like('t_all', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function detail($id=null)
	{
		$query = "SELECT * FROM detail_produk, mesin, produk WHERE detail_produk.id_produk = produk.id_produk AND detail_produk.id_mesin = mesin.id_mesin";
		If($id != null) {
			$this->db->where('detail_produk.id', $id);
		}
		return $this->db->query($query);
	}
	public function add($post)
	{
		$params['id_produk'] = $post['produkid'];
		$params['id_mesin'] = $post['mesinid'];
		$params['urutan_proses'] = $post['prosesurutan'];
		$params['t_proses'] = $post['proseswaktu'];
		$this->db->insert('detail_produk', $params);
	}

	public function edit($post)
	{
		$params['id_produk'] = $post['produkid'];
		$params['id_mesin'] = $post['mesinid'];
		$params['urutan_proses'] = $post['prosesurutan'];
		$params['t_proses'] = $post['proseswaktu'];
		$this->db->where('id', $post['number']);
		$this->db->update('detail_produk', $params);
	}
	
	public function del($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('detail_produk');
	}

	public function kode(){
        $q = $this->db->query("select t_all from produk");
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
