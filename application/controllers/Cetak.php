<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cetak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hasil_m');
        $this->load->model('Jadwal_m');
    }

    public function cetak_hasil()
    {
        $data['record1'] = $this->Hasil_m->get_cetak();
        $data['record2'] = $this->Jadwal_m->detail();
        $this->load->view('laporan/cetak_hasil', $data);

    }
}