<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('tb_spkp_detail');
        if($id != null) {
            $this->db->where('no_spkp', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tampil_ok() {
        $query = $this->db->get_where('tb_spkp', array('status' => 'OK'));
        return $query;
    }

    public function tampil($kode) {
        $hasil = $this->db->query("SELECT * FROM tb_spkp_detail a,tb_barang b where a.kode_barang=b.kode_barang and no_spkp='$kode'");
        return $hasil; 
    }

    public function tampil_spkp($kode) {
        $hasil = $this->db->query("SELECT * FROM tb_spkp where no_spkp='$kode'");
        return $hasil; 
    }

    public function mesin50($kode) {
        $hasil = $this->db->query("SELECT * FROM tb_spkp_detail a,tb_barang b where a.kode_barang=b.kode_barang and no_spkp='$kode' and b.mesin = '50' ORDER BY a.tenggat_waktu ASC");
        return $hasil; 
    }

    public function mesin80($kode) {
        $hasil = $this->db->query("SELECT * FROM tb_spkp_detail a,tb_barang b where a.kode_barang=b.kode_barang and no_spkp='$kode' and b.mesin = '80' ORDER BY a.tenggat_waktu ASC");
        return $hasil; 
    }

    public function mesin200($kode) {
        $hasil = $this->db->query("SELECT * FROM tb_spkp_detail a,tb_barang b where a.kode_barang=b.kode_barang and no_spkp='$kode' and b.mesin = '200' ORDER BY a.tenggat_waktu ASC");
        return $hasil; 
    }

    public function input_data($data) {
        $this->db->insert('tb_hasil', $data);
    }

    public function get_hasil($id) {
        $this->db->from('tb_hasil');
        if($id != null) {
            $this->db->where('no_spkp', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
	{
		$this->db->where('no_spkp', $id);
		$this->db->delete('tb_hasil');
    }

    public function tampil_belum_dijadwal() {
        $query = $this->db->get_where('tb_spkp', array('status_penjadwalan' => 'Belum Terjadwalkan', 'status' => 'OK'));
        return $query;
    }

    public function simpan_jadwal($id) {
        // $hasil = $this->db->query("UPDATE tb_spkp set status='OK' where no_spkp ='$id' ");
        // return $hasil;
        $name = 'Sudah Terjadwal';
        $this->db->set('status_penjadwalan', $name);
        $this->db->where('no_spkp', $id);
        $this->db->update('tb_spkp');
    }

    public function tampil_sudah_dijadwal() {
        $query = $this->db->get_where('tb_spkp', array('status_penjadwalan' => 'Sudah Terjadwal'));
        return $query;
    }

}