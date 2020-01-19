<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Result extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Result_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'result/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'result/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'result/index.html';
            $config['first_url'] = base_url() . 'result/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Result_m->total_rows($q);
        $result = $this->Result_m->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'result_data' => $result,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('result/hasil_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Result_m->get_by_id($id);
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
            $this->load->view('result/hasil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('result'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('result/create_action'),
	    'id_proses' => set_value('id_proses'),
	    'id_produk' => set_value('id_produk'),
	    'urutan_proses' => set_value('urutan_proses'),
	    'id_mesin' => set_value('id_mesin'),
	    'ci' => set_value('ci'),
	    'ti' => set_value('ti'),
	    'rj' => set_value('rj'),
	);
        $this->load->view('result/hasil_form', $data);
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

            $this->Result_m->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('result'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Result_m->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('result/update_action'),
		'id_proses' => set_value('id_proses', $row->id_proses),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'urutan_proses' => set_value('urutan_proses', $row->urutan_proses),
		'id_mesin' => set_value('id_mesin', $row->id_mesin),
		'ci' => set_value('ci', $row->ci),
		'ti' => set_value('ti', $row->ti),
		'rj' => set_value('rj', $row->rj),
	    );
            $this->load->view('result/hasil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('result'));
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

            $this->Result_m->update($this->input->post('id_proses', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('result'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Result_m->get_by_id($id);

        if ($row) {
            $this->Result_m->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('result'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('result'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('urutan_proses', 'urutan proses', 'trim|required');
	$this->form_validation->set_rules('id_mesin', 'id mesin', 'trim|required');
	$this->form_validation->set_rules('ci', 'ci', 'trim|required|numeric');
	$this->form_validation->set_rules('ti', 'ti', 'trim|required|numeric');
	$this->form_validation->set_rules('rj', 'rj', 'trim|required|numeric');

	$this->form_validation->set_rules('id_proses', 'id_proses', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Result.php */
/* Location: ./application/controllers/Result.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-15 01:39:45 */
/* http://harviacode.com */