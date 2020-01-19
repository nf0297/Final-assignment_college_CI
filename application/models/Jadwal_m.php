<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_m extends CI_Model {

	public $table = 'penjadwalan';
    public $id = 'no_penjadwalan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

	public function save($relative_list) 
	{
		for ($x = 0; $x< count($relative_list); $x++) {

			$data[] = array(

				'no_penjadwalan' => $relative_list[$x]['no_penjadwalan'],
				'tanggal' => $relative_list[$x]['tanggal'],
				'id_produk' => $relative_list[$x]['id_produk'],
				'jumlah' => $relative_list[$x]['jumlah'],
			);
		}

		try {
			//insert data to database..
			for ($x = 0; $x<count($relative_list); $x++) {
				$this->db->insert('penjadwalan', $data[$x]);
			}
			return 'success';
		} catch (Exception $e) {
			return 'failed';
		}
	}
	
	public function get($id = null)
	{	
		$this->db->select('*');
		$this->db->from('penjadwalan');
		if($id != null) {
			$this->db->where('tanggal', $id); 
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_by_tanggal($tgl)
	{
	$this->db->where('tanggal', $tgl);
    return $this->db->get($this->table)->result();
	}
	
	public function detail($id = null)
	{	
		$query = "SELECT DISTINCT penjadwalan.no_penjadwalan, penjadwalan.tanggal, produk.id_produk, produk.deskripsi_produk, penjadwalan.jumlah FROM penjadwalan, detail_produk, mesin, produk WHERE penjadwalan.id_produk = detail_produk.id_produk AND detail_produk.id_produk = produk.id_produk AND mesin.id_mesin = detail_produk.id_mesin";
		If($id != null) {
			$this->db->where('tanggal', $id);
		}
		return $this->db->query($query);
	}

	public function add($post)
	{
		$params['tanggal'] = $post['tanggal'];
		$params['id_produk'] = $post['kdproduk'];
		$params['jumlah'] = $post['jml'];
		$this->db->insert('penjadwalan', $params);
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
		$this->db->where('no_penjadwalan', $id);
		$this->db->delete('penjadwalan');
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
