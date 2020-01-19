<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dummy extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dummy_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'dummy/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dummy/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dummy/index.html';
            $config['first_url'] = base_url() . 'dummy/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dummy_m->total_rows($q);
        $dummy = $this->Dummy_m->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dummy_data' => $dummy,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('dummy/detail_cproduk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Dummy_m->get_by_id($id);
        if ($row) {
            $data = array(
		'id_cproses' => $row->id_cproses,
		'id_produk' => $row->id_produk,
		'id_mesin' => $row->id_mesin,
		'urutan_proses' => $row->urutan_proses,
		'ci' => $row->ci,
		'ti' => $row->ti,
		'ri' => $row->ri,
	    );
            $this->load->view('dummy/detail_cproduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dummy'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dummy/create_action'),
	    'id_cproses' => set_value('id_cproses'),
	    'id_produk' => set_value('id_produk'),
	    'id_mesin' => set_value('id_mesin'),
	    'urutan_proses' => set_value('urutan_proses'),
	    'ci' => set_value('ci'),
	    'ti' => set_value('ti'),
	    'ri' => set_value('ri'),
	);
        $this->load->view('dummy/detail_cproduk_form', $data);
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
		'ci' => $this->input->post('ci',TRUE),
		'ti' => $this->input->post('ti',TRUE),
		'ri' => $this->input->post('ri',TRUE),
	    );

            $this->Dummy_m->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dummy'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dummy_m->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dummy/update_action'),
		'id_cproses' => set_value('id_cproses', $row->id_cproses),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'id_mesin' => set_value('id_mesin', $row->id_mesin),
		'urutan_proses' => set_value('urutan_proses', $row->urutan_proses),
		'ci' => set_value('ci', $row->ci),
		'ti' => set_value('ti', $row->ti),
		'ri' => set_value('ri', $row->ri),
	    );
            $this->load->view('dummy/detail_cproduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dummy'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cproses', TRUE));
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'id_mesin' => $this->input->post('id_mesin',TRUE),
		'urutan_proses' => $this->input->post('urutan_proses',TRUE),
		'ci' => $this->input->post('ci',TRUE),
		'ti' => $this->input->post('ti',TRUE),
		'ri' => $this->input->post('ri',TRUE),
	    );

            $this->Dummy_m->update($this->input->post('id_cproses', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dummy'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dummy_m->get_by_id($id);

        if ($row) {
            $this->Dummy_m->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dummy'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dummy'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('id_mesin', 'id mesin', 'trim|required');
	$this->form_validation->set_rules('urutan_proses', 'urutan proses', 'trim|required');
	$this->form_validation->set_rules('ci', 'ci', 'trim|required|numeric');
	$this->form_validation->set_rules('ti', 'ti', 'trim|required|numeric');
	$this->form_validation->set_rules('ri', 'ri', 'trim|required|numeric');

	$this->form_validation->set_rules('id_cproses', 'id_cproses', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dummy.php */
/* Location: ./application/controllers/Dummy.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-15 01:39:23 */
/* http://harviacode.com */