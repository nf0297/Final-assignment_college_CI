<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('view_login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('User_m');
			$query = $this->User_m->login($post);
			if($query->num_rows() > 0) {
					$row = $query->row();
					$params = array(
						'userid' => $row->id_pengguna,
						'level' => $row->level
					);
					$this->session->set_userdata($params);
					echo "<script>
						alert('Selamat, login berhasil');
						window.location='".site_url('dashboard')."';
					</script>";
				} else {
					echo "<script>
						alert('Login gagal, username / password salah');
						window.location='".site_url('Authentication/login')."';
					</script>";
				}

			}
		}

	public function logout()
	{
		$params = array('userid','level');
		$this->session->unset_userdata($params);
		redirect('Authentication/login');
	}


}
