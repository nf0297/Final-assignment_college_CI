<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Metode extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Metode_m');
        $this->load->model('Dummy_m');
        $this->load->model('Result_m');
        $this->load->model('Jadwal_m');
        $this->load->model('Dproduk_m');
        $this->load->model('Mesin_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'metode_m/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'metode_m/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'metode_m/index.html';
            $config['first_url'] = base_url() . 'metode_m/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Metode_m->total_rows($q);
        $metode_m = $this->Metode_m->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'metode_m_data' => $metode_m,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->template->load('template','hasil/hasil_search', $data);
    }

    public function active_schedule()
    {
        $this->_rules();
         //hapus seluruh hasil
        $del = $this->Result_m->delete_all_data();
              
        //update tabel by data tanggal
        //panggil tabel terkait (jadwal, detail_produk, mesin)
        //mesin

        $tgl = $this->input->post('tanggal');
              
        //penjadwalan        
        $param2 = $this->Jadwal_m->get($tgl);
        if ($param2->num_rows()<1) {
            echo "<script>alert('Jadwal tidak ada');</script>";

            echo "<script>window.location='".site_url('jadwal/hasil')."';</script>";
        } else {
        foreach ($param2->result() as $b){
            $id_produk = $b->id_produk;
            $jml = $b->jumlah;

            $param3 = $this->Dproduk_m->getp($id_produk);
                foreach ($param3->result() as $b){
                    $id_produk = $b->id_produk;
                    $id_mesin = $b->id_mesin;
                    $t_proses = $b->t_proses;
                    $urutan = $b->urutan_proses;

                    $param4 = $this->Mesin_m->getm($id_mesin); 
                    

                    foreach ($param4->result() as $b){
                        $jumlah_mesin = $b->jumlah_mesin;

                        $t_all = ($t_proses * $jml) / $jumlah_mesin; 
                        
                        $params = $this->db->query("UPDATE detail_produk SET t_all = '$t_all' WHERE id_produk = '$id_produk' and urutan_proses = '$urutan'");
                    }
                }
        }

        //inisialisasi
        $proses = $this->Metode_m->get_by_awal_tanggal($tgl);
         "Inisialisasi Awal Tabel <br>";
        foreach ($proses as $row){
            $row->id .",".
            $row->id_produk .",".
            $row->id_mesin .",".
            $row->urutan_proses .",".
            $row->t_proses .",".
            $row->t_all ."<br>";
            //set nilai ci, cek apakah proses sebelumnya sudah dijalankan pada tabel t_hasil dan ambil nilai $rj
            //$prosesb4 = $this->T_hasil_model->get_by_prosesb4($row->job,$row->no_proses, $row->mesin);
            $waktu_awal = 0;
            //if ($prosesb4){
            //  $ci=$prosesb4->rj;
            //}
            $total_waktu = $row->t_all;
            $waktu_akhir = $waktu_awal+$total_waktu;
           $data = array(
                'id_produk' => $row->id_produk,
                'urutan_proses' => $row->urutan_proses,
                'id_mesin' => $row->id_mesin,
                'ci' => $waktu_awal,
                'ti' => $total_waktu,
                'ri' => $waktu_akhir,
                );
            $this->Dummy_m->insert($data);          
        }
        $c_id=0;
        $c_job = 0;
        $c_proses = 0;
        //end of inisialisasi
        $i=0;
        $n = $this->Metode_m->total_rows();
        while ($i<$n){
            
            //tampilkan isi dari c_proses
             "<br>Looping ke-".($i+1)."<br>";
            $cp = $this->Dummy_m->get_all();
           foreach ($cp as $row){
              
                $row->id_cproses .",".
                $row->id_produk .",".
                $row->id_mesin .",".
                $row->urutan_proses .",".
                $row->ci .",".
                $row->ti .",".
                $row->ri ."<br>";}
                
            //ambil ri paling kecil     
            $min_ri = $this->Dummy_m->get_by_min_ri();
            if ($min_ri){
              
                $min_ri->id_cproses .",".
                $min_ri->id_produk .",".
                $min_ri->urutan_proses .",".
                $min_ri->id_mesin .",".
                $min_ri->ri ."<br>";        
                //tambahkan min ri ke dalam insert 
                $data = array(
                    'id_produk' => $min_ri->id_produk,
                    'urutan_proses' => $min_ri->urutan_proses,
                    'id_mesin' => $min_ri->id_mesin,
                    'ci' => $min_ri->ci,
                    'ti' => $min_ri->ti,
                    'rj' => $min_ri->ri,
                    );
                $this->Result_m->insert($data);
                //simpan nilai id_proses yang terpilih
                $c_id=$min_ri->id_cproses;
                $c_job=$min_ri->id_produk;
                $c_proses=$min_ri->urutan_proses;
                $c_mesin=$min_ri->id_mesin;
                $c_ri = $min_ri->ri;
            
                //update tabel c_proses menggantikan nilai yang tadi
                //delete job dan proses yang sudah terpilih
                $this->Dummy_m->delete($c_id);
                //mengupdate ci dan ri dari proses yang telah ada di cproses
                $cp2 = $this->Dummy_m->get_all();
                foreach ($cp2 as $row){
                    if ($row->id_mesin == $c_mesin)
                        if ($row->ci <$c_ri){
                            //update ci dan ri dari baris tersebut
                            $data = array(
                            'id_produk' => $row->id_produk,
                            'urutan_proses' => $row->urutan_proses,
                            'id_mesin' => $row->id_mesin,
                            'ci' => $c_ri,
                            'ti' => $row->ti,
                            'ri' => $row->ti+$c_ri,
                            );
                            $this->Dummy_m->update($row->id_cproses,$data);
                        
                        }
                }
                //mencari proses selanjutnya dari job yang terpilih
                $next_proses = $this->Metode_m->get_next_process($c_job,$c_proses+1);
                if ($next_proses){
                    //cari ri dari next_proses
                    $prosesb4 = $this->Result_m->get_by_process_before($next_proses->id_produk, $next_proses->urutan_proses, $next_proses->id_mesin);
                    $ci = 0;
                    if ($prosesb4){
                        $ci=$prosesb4->rj;
                    }
                    $ti= $next_proses->t_all;
                    $ri = $ci+$ti;
                   $data = array(
                        'id_produk' => $next_proses->id_produk,
                        'urutan_proses' => $next_proses->urutan_proses,
                        'id_mesin' => $next_proses->id_mesin,
                        'ci' => $ci,
                        'ti' => $ti,
                        'ri' => $ri,
                        );
                    $this->Dummy_m->insert($data);          
                }
            }
            $i=$i+1;
           
        } 
            echo "<script>alert('Jadwal berhasil diproses');</script>";

            echo "<script>window.location='".site_url('hasil')."';</script>";
    }
}

    public function cetak_schedule()
    {
        echo "<table border=1 cellpadding=3 cellspacing=0 width=1200>
        <tr bgcolor=\"#99ccff\" align=\"center\"><td rowspan=2 width=70>Mesin</td>";
        $paramsch1 = $this->Hasil_m->select_max();
        $paramsch2 = $paramsch1 / 1000;
        for ($i=0; $i<10; $i++) {
            $detik=$i*1000;
            echo "<td colspan=50 align=left width=70><b>$detik</b></td>\n";
          }
        echo "</tr>";
        echo "<tr bgcolor=\"#99ccff\">";
        for ($i=0; $i<50; $i++) {
            echo "<td colspan=10></td>";
        }
        echo "</tr>";
        
        $lmesin = array(
                "A", "B", "C","D"
        );
        //menampilkan mesin
        foreach ($lmesin as $m){        
            echo "<tr bgcolor=\"#99ccff\">";
            //
            echo "<td width=70>$m</td>";
            $mesin = $this->Result_m->get_by_machine($m);
            $c_titik = 0;
            foreach ($mesin as $row){
                $awal = (int)($row->ci/20);
                if ($awal!=$c_titik){
                    //buat kolom kosong dari c_titik sampai awal
                    $l_col = $awal-$c_titik;
                    echo "<td colspan=$l_col>&nbsp;</td>";
                    $c_titik = $c_titik+ $l_col;        
                }
                //cetak kolomnya
                $l_col = (int)(($row->ti)/20);
                    echo "<td colspan=$l_col bgcolor=white align=center>".$row->id_produk."-".$row->urutan_proses."</td>";
                $c_titik = $c_titik +$l_col;
            }                   
            //cetak kolom terakhir
            $lcol = 500-$c_titik;
            echo "<td colspan=$lcol>&nbsp;</td></tr>";
        }
        echo "</table>";

    }

    public function read($id) 
    {
        $row = $this->Metode_m->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_produk' => $row->id_produk,
		'id_mesin' => $row->id_mesin,
		'urutan_proses' => $row->urutan_proses,
		't_proses' => $row->t_proses,
		't_all' => $row->t_all,
	    );
            $this->load->view('metode_m/detail_produk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('metode_m'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('metode_m/create_action'),
	    'id' => set_value('id'),
	    'id_produk' => set_value('id_produk'),
	    'id_mesin' => set_value('id_mesin'),
	    'urutan_proses' => set_value('urutan_proses'),
	    't_proses' => set_value('t_proses'),
	    't_all' => set_value('t_all'),
	);
        $this->load->view('metode_m/detail_produk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'id_mesin' => $this->input->post('id_mesin',TRUE),
		'urutan_proses' => $this->input->post('urutan_proses',TRUE),
		't_proses' => $this->input->post('t_proses',TRUE),
		't_all' => $this->input->post('t_all',TRUE),
	    );

            $this->Metode_m->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('metode_m'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Metode_m->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('metode_m/update_action'),
		'id' => set_value('id', $row->id),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'id_mesin' => set_value('id_mesin', $row->id_mesin),
		'urutan_proses' => set_value('urutan_proses', $row->urutan_proses),
		't_proses' => set_value('t_proses', $row->t_proses),
		't_all' => set_value('t_all', $row->t_all),
	    );
            $this->load->view('metode_m/detail_produk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('metode_m'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'id_mesin' => $this->input->post('id_mesin',TRUE),
		'urutan_proses' => $this->input->post('urutan_proses',TRUE),
		't_proses' => $this->input->post('t_proses',TRUE),
		't_all' => $this->input->post('t_all',TRUE),
	    );

            $this->Metode_m->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('metode_m'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Metode_m->get_by_id($id);

        if ($row) {
            $this->Metode_m->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('metode_m'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('metode_m'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required');    
   	$this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('id_mesin', 'id mesin', 'trim|required');
	$this->form_validation->set_rules('urutan_proses', 'urutan proses', 'trim|required');
	$this->form_validation->set_rules('t_proses', 't proses', 'trim|required|numeric');
	$this->form_validation->set_rules('t_all', 't all', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    }

}

/* End of file Metode_m.php */
/* Location: ./application/controllers/Metode_m.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-15 01:38:59 */
/* http://harviacode.com */