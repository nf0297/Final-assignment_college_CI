<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('jadwal_m');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['rows'] = $this->jadwal_m->detail();
		$data['row'] = $this->jadwal_m->get();
		$this->template->load('template', 'jadwal/jadwal_data', $data);
	}

	public function tampiltanggal()
	{
		$id = $this->input->post('tgl');
		$query = $this->jadwal_m->detail($id);
		if($query->num_rows() > 0) {
			$data['rows'] = $query->result();
			$this->template->load('template', 'jadwal/jadwal_data', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('jadwal')."';</script>";
		}
	}

	public function add()
	{
		
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('kdproduk', 'Kode Produk', 'required');
		$this->form_validation->set_rules('jml', 'Jumlah Produk', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		/*berfungsi untuk membuat tulisan error berwarna merah pada semua error */

		if ($this->form_validation->run() == FALSE) {
			$data['row'] = $this->jadwal_m->get();
			$data['rows'] = $this->jadwal_m->detail()->result();
			$this->template->load('template', 'jadwal/jadwal_form_add', $data);
		} else {
			$post = $this->input->post(null,TRUE);
			$this->jadwal_m->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('jadwal')."';</script>";
		}
	}

	public function hasil()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		/*berfungsi untuk membuat tulisan error berwarna merah pada semua error */

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'jadwal/jadwal_form_hasil');
		} else {
			$id = $this->input->post('tanggal');
			$query = $this->jadwal_m->detail($id);
			if($query->num_rows > 0) {
				$data['row'] = $query->result();
				$this->template->load('template','jadwal/jadwal_detail', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('jadwal/hasil')."';</script>";
			}
			
		}
	}
			
	public function del()
	{
		$id = $this->input->post('no');
		$this->jadwal_m->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='".site_url('jadwal')."';</script>";
	}
}	
		

	

	/*public function edit($id)
	{
		$this->form_validation->set_rules('machinecode', 'Kode jadwal', 'required|min_length[4]');
		$this->form_validation->set_rules('machinename', 'Nama jadwal', 'required|min_length[4]');
		$this->form_validation->set_rules('machineqty', 'Jumlah jadwal', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 4 karakter');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		/*berfungsi untuk membuat tulisan error berwarna merah pada semua error 

		if ($this->form_validation->run() == FALSE) {
			$query = $this->jadwal_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'jadwal/jadwal_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('jadwal')."';</script>";
			}
		} else {
			$post = $this->input->post(null,TRUE);
			$this->jadwal_m->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('jadwal')."';</script>";
		}
	}
	public function proses($id)
	{
		$this->form_validation->set_rules('machinecode', 'Kode jadwal', 'required|min_length[4]');
		$this->form_validation->set_rules('machinename', 'Nama jadwal', 'required|min_length[4]');
		$this->form_validation->set_rules('machineqty', 'Jumlah jadwal', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 4 karakter');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		berfungsi untuk membuat tulisan error berwarna merah pada semua error 

		if ($this->form_validation->run() == FALSE) {
			$query = $this->jadwal_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'jadwal/jadwal_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('jadwal')."';</script>";
			}
		} else {
			$post = $this->input->post(null,TRUE);
			$this->jadwal_m->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('jadwal')."';</script>";
		}
	}

	public function proses($id)
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal jadwal', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE) {
			$query = $this->jadwal_m->detail($id);
			If($query->num_rows() > 0) {
				$data['detail'] = $query->result();
				$this->template->load('template', 'jadwal/jadwal_form_detail', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('jadwal')."';</script>";
			}
		}
	}

	*/

	/*function check_username()
	{
		$post = $this->input->post(null,TRUE);
		$query = $this->db->query("SELECT * FROM produk WHERE id_produk != '$post['kdproduk']'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('check_username', '%s tidak ada');
			return FALSE;
		} else {
			return TRUE;
		}
	}*/



