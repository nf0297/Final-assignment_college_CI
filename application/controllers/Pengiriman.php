<?php 

class Pengiriman extends CI_Controller{

	function __construct(){
 	parent::__construct();
 	$this->load->model(array('M_pengiriman','M_pengguna'));
} 
	function lihat_data(){

		$data['record'] = $this->M_pengiriman->tampilkan_data();
		//$data['dropdown'] = $this->M_pengiriman->tampil_data();
		$this->template->content->view('Pengiriman/lihat_data',$data);
		$this->template->publish();
	}
	

	
	//menampilkan detail di tombol detail
		function tampil_detail(){

		$id_pengiriman	 =	$this->uri->segment(3);
		$data['record']  =	$this->M_pengiriman->detail($id_pengiriman)->result();
		$data['record2'] =	$this->M_pengiriman->detail($id_pengiriman)->row_array();
		$this->template->content->view('Pengiriman/Detail',$data);
		$this->template->publish();

	}
	
	
	

	function simpan(){
		$id_pengguna = $this->input->post('id_pengguna');
		$lintang_x			=	$this->input->post('lintang_x');
			$bujur_x			= 	$this->input->post('bujur_x');
			$lintang_y		= 	$this->input->post('lintang_y');
			$bujur_y		= 	$this->input->post('bujur_y');
			$lintang_z		= 	$this->input->post('lintang_z');
			$bujur_z		= 	$this->input->post('bujur_z');
		$data = array('id_pengguna' => $id_pengguna , 
										'lintang_x'=>$lintang_x,
										'bujur_x'=>$bujur_x,
										'lintang_y'=>$lintang_y,
										'bujur_y'=>$bujur_y,
										'lintang_z'=>$lintang_z,
										'bujur_z'=>$bujur_z);
		$this->M_pengiriman->simpan_detail($data);
		redirect('Pengiriman/form_input');
	}

	function selesai(){
		$id_pengiriman = $this->input->post('id_pengiriman');
		$id_pl = $this->input->post('id_pl');
		$tgl_kirim = $this->input->post('tgl_kirim');

		$data = array('id_pengiriman' => $id_pengiriman, 'id_pl'=>$id_pl,
		'tgl_kirim'=>$tgl_kirim);
		$this->M_pengiriman->simpan($data);
		$this->M_pengiriman->selesai($id_pengiriman);
		redirect('Pengiriman/lihat_data');

	}

	function form_input(){
		$data['kode'] = $this->M_pengiriman->kode();	
		$data['pelanggan'] = $this->M_pengguna->lihat_data()->result();
		$data['detail'] = $this->M_pengiriman->tampilkan_detail();
		$this->template->content->view('Pengiriman/form_input',$data);
		$this->template->publish();

	}
	//function untuk dropdown
	function titik_koordinat(){
        $id_pengguna=$this->input->post('id');
		// $data=$this->M_pengiriman->get_data_barang_bykode($id_pengguna);
		$data=$this->M_pengiriman->get_data_barang_bykode($id_pengguna)->row_array();
		echo json_encode($data);
    }

	function hapusitem(){
		$id = $this->uri->segment(3);
		$this->M_pengiriman->delete($id);
		redirect('Pengiriman/form_input');
	}

	//menghapus data pengiriman
	function hapus(){
		$id = $this->uri->segment(3);
		$this->M_pengiriman->delete($id);
		redirect('Pengiriman/lihat_data');
	}

	function edit(){
		$id = $this->uri->segment(3);
		$data['record'] = $this->M_pengiriman->tampilkan_detail_id($id)->row_array();
		$data['pelanggan'] = $this->M_pengguna->lihat_data()->result();
		$this->template->content->view('Pengiriman/Form_edit',$data);
		$this->template->publish();
	}

	function update(){
		$id_pj = $this->input->post('id_pj');
		$id_pengguna = $this->input->post('id_pengguna');
		$id_pl = $this->input->post('id_pl');
		$tgl_kirim = $this->input->post('tgl_kirim');
		$data = array('id_pl' => $id_pl, 'tgl_kirim' => $tgl_kirim,'id_pengguna' => $id_pengguna);
		$this->M_pengiriman->edit($data,$id_pj);
		redirect('Pengiriman/lihat_data');

	}





}
