<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('mesin_m');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['row'] = $this->mesin_m->get();
		$this->template->load('template', 'mesin/mesin_data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('machinecode', 'Kode Mesin', 'required|is_unique[mesin.id_mesin]|min_length[4]');
		$this->form_validation->set_rules('machinename', 'Nama Mesin', 'required|min_length[4]');
		$this->form_validation->set_rules('machineqty', 'Jumlah Mesin', 'required');
		$this->form_validation->set_message('is_unique', '%s sudah dipakai');
		$this->form_validation->set_message('min_length', '{field} minimal 4 karakter');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		/*berfungsi untuk membuat tulisan error berwarna merah pada semua error */

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'mesin/mesin_form_add');
		} else {
			$post = $this->input->post(null,TRUE);
			$this->mesin_m->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('mesin')."';</script>";
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('machinecode', 'Kode Mesin', 'required|min_length[4]');
		$this->form_validation->set_rules('machinename', 'Nama Mesin', 'required|min_length[4]');
		$this->form_validation->set_rules('machineqty', 'Jumlah Mesin', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 4 karakter');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		/*berfungsi untuk membuat tulisan error berwarna merah pada semua error */

		if ($this->form_validation->run() == FALSE) {
			$query = $this->mesin_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'mesin/mesin_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('mesin')."';</script>";
			}
		} else {
			$post = $this->input->post(null,TRUE);
			$this->mesin_m->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('mesin')."';</script>";
		}
	}

	public function del()
	{
		$id = $this->input->post('number');
		$this->mesin_m->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='".site_url('mesin')."';</script>";
	}

	function check_username()
	{
		$post = $this->input->post(null,TRUE);
		$query = $this->db->query("SELECT * FROM mesin WHERE id_mesin = '$id' AND id_pengguna != '$post[id_pengguna]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('check_username', '%s sudah digunakan');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	/*function check_number()
	{
		$post = $this->input->post(null,TRUE);
		if(is_numeric($post)) {
			return FALSE;
		} else {
			$this->form_validation->set_message('check_number', '%s bukan angka');
			return TRUE;
		}
	}*/
	
	
}
