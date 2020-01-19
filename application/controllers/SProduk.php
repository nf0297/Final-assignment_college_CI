<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SProduk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('sproduk_m');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['row'] = $this->sproduk_m->get();
		$this->template->load('template', 'short_produk/sproduk_data', $data);
	}

	public function add()
	{

		$this->form_validation->set_rules('produkid', 'Kode Produk', 'required|is_unique[produk.id_produk]');
		$this->form_validation->set_rules('produkdesk', 'Nama Produk', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('is_unique', '%s sudah digunakan.');


		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		/*berfungsi untuk membuat tulisan error berwarna merah pada semua error */

		if ($this->form_validation->run() == FALSE) {
			$data['row'] = $this->sproduk_m->get();
			$this->template->load('template', 'short_produk/sproduk_form_add',$data);
		} else {
			$post = $this->input->post(null,TRUE);
			$this->sproduk_m->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('sproduk')."';</script>";
		}
	}

	public function edit($id)
	{

		$this->form_validation->set_rules('produkid', 'Kode Produk', 'required');
		$this->form_validation->set_rules('produkdesk', 'Nama Produk', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('unique', '%s sudah digunakan, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		/*berfungsi untuk membuat tulisan error berwarna merah pada semua error */

		if ($this->form_validation->run() == FALSE) {
			$query = $this->sproduk_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'short_produk/sproduk_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('sproduk')."';</script>";
			}
		} else {
			$post = $this->input->post(null,TRUE);
			$this->sproduk_m->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('sproduk')."';</script>";
		}
	}

	public function del()
	{
		$id = $this->input->post('produk_id');
		$this->sproduk_m->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='".site_url('sproduk')."';</script>";
	}

	/*function check_id_produk()
	{
		$post = $this->input->post(null,TRUE);
		$query = $this->db->query("SELECT * FROM mesin WHERE id_produk != '$post[id_produk]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('check_id_produk', '%s sudah digunakan');
			return FALSE;
		} else {
			return TRUE;
		}
	}*/
}
