<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Penjadwalan extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('Penjadwalan_m');
  }
  
  public function index(){
    $data['row'] = $this->Penjadwalan_m->get();
    
    $this->load->view('template','penjadwalan_data', $data); // Load view index.php
  }
  
  public function save(){
    // Ambil data yang dikirim dari form
    $no_jadwal = $this->input->post('nomor'); // Ambil data nis dan masukkan ke variabel nis
    $tanggal = $this->input->post('tanggal'); // Ambil data nama dan masukkan ke variabel nama
    $id_produk = $this->input->post('idpro'); // Ambil data telp dan masukkan ke variabel telp
    $jumlah = $this->input->post('jml'); // Ambil data alamat dan masukkan ke variabel alamat
    $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($no_jadwal as $jadwalno){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
      					  'no_penjadwalan'=>$no_jadwal,
      					  'tanggal'=>$tanggal[$index],  // Ambil dan set data nama sesuai index array dari $index
       					  'id_produk'=>$jumlah[$index],  // Ambil dan set data telepon sesuai index array dari $index
        				  'jumlah'=>$jumlah[$index],  // Ambil dan set data alamat sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->SiswaModel->save_batch($data); // Panggil fungsi save_batch yang ada di model siswa (SiswaModel.php)
    
    // Cek apakah query insert nya sukses atau gagal
    if($sql){ // Jika sukses
      echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('penjadwalan/penjadwalan_data')."';</script>";
    }else{ // Jika gagal
      echo "<script>alert('Data gagal disimpan');window.location = '".base_url('index.penjadwalan/penjadwalan_form_add')."';</script>";
    }
  }
}
