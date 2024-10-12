<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_komplek extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_komplek_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_komplek/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_komplek/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_komplek/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_komplek_model->total_rows($q);
        $tbl_komplek = $this->Tbl_komplek_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_komplek_data' => $tbl_komplek,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_komplek/tbl_komplek_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_komplek_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_komplek' => $row->id_komplek,
		'nama_komplek' => $row->nama_komplek,
	    );
            $this->template->load('template','tbl_komplek/tbl_komplek_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_komplek'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_komplek/create_action'),
	    'id_komplek' => set_value('id_komplek'),
	    'nama_komplek' => set_value('nama_komplek'),
	);
        $this->template->load('template','tbl_komplek/tbl_komplek_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_komplek' => $this->input->post('nama_komplek',TRUE),
	    );

            $this->Tbl_komplek_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_komplek'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_komplek_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_komplek/update_action'),
		'id_komplek' => set_value('id_komplek', $row->id_komplek),
		'nama_komplek' => set_value('nama_komplek', $row->nama_komplek),
	    );
            $this->template->load('template','tbl_komplek/tbl_komplek_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_komplek'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_komplek', TRUE));
        } else {
            $data = array(
		'nama_komplek' => $this->input->post('nama_komplek',TRUE),
	    );

            $this->Tbl_komplek_model->update($this->input->post('id_komplek', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_komplek'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_komplek_model->get_by_id($id);

        if ($row) {
            $this->Tbl_komplek_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_komplek'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_komplek'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_komplek', 'nama komplek', 'trim|required');

	$this->form_validation->set_rules('id_komplek', 'id_komplek', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_komplek.php */
/* Location: ./application/controllers/Tbl_komplek.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-10-12 01:49:20 */
/* http://harviacode.com */