<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hasil_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'hasil/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hasil/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hasil/index.html';
            $config['first_url'] = base_url() . 'hasil/index.html';
        }

        $config['per_page'] = 50;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Hasil_m->total_rows($q);
        $hasil = $this->Hasil_m->get_limit_data($config['per_page'], $start, $q);
        $detail = $this->Hasil_m->get_detail($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        
        $data = array(
            'hasil_data' => $hasil,
            'detail_data' => $detail,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','hasil/hasil_list', $data);
    }

    public function cetak_hasil()
    {
        $data['record1'] = $this->Hasil_m->get_detail($start, $q);
        $data['record2'] = $this->
        $this->template->load('template', 'laporan/cetak_hasil', $data);
    }

    public function read($id) 
    {
        $row = $this->Hasil_m->get_by_id($id);
        if ($row) {
            $data = array(
		'id_proses' => $row->id_proses,
		'id_produk' => $row->id_produk,
		'urutan_proses' => $row->urutan_proses,
		'id_mesin' => $row->id_mesin,
		'ci' => $row->ci,
		'ti' => $row->ti,
		'rj' => $row->rj,
	    );
            $this->load->view('hasil/hasil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('hasil/create_action'),
	    'id_proses' => set_value('id_proses'),
	    'id_produk' => set_value('id_produk'),
	    'urutan_proses' => set_value('urutan_proses'),
	    'id_mesin' => set_value('id_mesin'),
	    'ci' => set_value('ci'),
	    'ti' => set_value('ti'),
	    'rj' => set_value('rj'),
	);
        $this->load->view('hasil/hasil_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'urutan_proses' => $this->input->post('urutan_proses',TRUE),
		'id_mesin' => $this->input->post('id_mesin',TRUE),
		'ci' => $this->input->post('ci',TRUE),
		'ti' => $this->input->post('ti',TRUE),
		'rj' => $this->input->post('rj',TRUE),
	    );

            $this->Hasil_m->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hasil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Hasil_m->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hasil/update_action'),
		'id_proses' => set_value('id_proses', $row->id_proses),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'urutan_proses' => set_value('urutan_proses', $row->urutan_proses),
		'id_mesin' => set_value('id_mesin', $row->id_mesin),
		'ci' => set_value('ci', $row->ci),
		'ti' => set_value('ti', $row->ti),
		'rj' => set_value('rj', $row->rj),
	    );
            $this->load->view('hasil/hasil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_proses', TRUE));
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'urutan_proses' => $this->input->post('urutan_proses',TRUE),
		'id_mesin' => $this->input->post('id_mesin',TRUE),
		'ci' => $this->input->post('ci',TRUE),
		'ti' => $this->input->post('ti',TRUE),
		'rj' => $this->input->post('rj',TRUE),
	    );

            $this->Hasil_m->update($this->input->post('id_proses', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hasil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hasil_m->get_by_id($id);

        if ($row) {
            $this->Hasil_m->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hasil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasil'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
	$this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('urutan_proses', 'urutan proses', 'trim|required');
	$this->form_validation->set_rules('id_mesin', 'id mesin', 'trim|required');
	$this->form_validation->set_rules('ci', 'ci', 'trim|required|numeric');
	$this->form_validation->set_rules('ti', 'ti', 'trim|required|numeric');
	$this->form_validation->set_rules('rj', 'rj', 'trim|required|numeric');

	$this->form_validation->set_rules('id_proses', 'id_proses', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    }

}

/* End of file Hasil.php */
/* Location: ./application/controllers/Hasil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-07 20:22:51 */
/* http://harviacode.com */