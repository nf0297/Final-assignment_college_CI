<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('user_m');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add()
	{

		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[pengguna.username]|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
		array('matches' => '%s harus sesuai dengan password'));
		/* %s atau {field} berarti sebagai nama dari set_rulesnya seperti Nama, Username, Konfirmasi Password */
		$this->form_validation->set_rules('level', 'Level', 'required|max_length[1]');
		/* untuk pesan dapat menggunakan array (satu-persatu) seperti di baris ke 25, atau menggunakan set_message seperti dibaris 29-30 */
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah dipakai.');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		/*berfungsi untuk membuat tulisan error berwarna merah pada semua error */

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'user/user_form_add');
		} else {
			$post = $this->input->post(null,TRUE);
			$this->user_m->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
		}
	}

	public function edit($id)
	{

		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_check_username');
		if($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
			array('matches' => '%s harus sesuai dengan password'));
		}
		if($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
			array('matches' => '%s harus sesuai dengan password'));
		}
		$this->form_validation->set_rules('level', 'Level', 'required|max_length[1]');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah dipakai.');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		/*berfungsi untuk membuat tulisan error berwarna merah pada semua error */

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('user')."';</script>";
			}
		} else {
			$post = $this->input->post(null,TRUE);
			$this->user_m->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
		}
	}

	public function del()
	{
		$id = $this->input->post('user_id');
		$this->user_m->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='".site_url('user')."';</script>";
	}

	function check_username()
	{
		$post = $this->input->post(null,TRUE);
		$query = $this->db->query("SELECT * FROM pengguna WHERE username = '$post[username]' AND id_pengguna != '$post[id_pengguna]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('check_username', '%s sudah digunakan');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	
	
}
