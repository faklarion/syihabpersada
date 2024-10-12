<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_rumah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_rumah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_rumah/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_rumah/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_rumah/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_rumah_model->total_rows($q);
        $tbl_rumah = $this->Tbl_rumah_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_rumah_data' => $tbl_rumah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_rumah/tbl_rumah_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_rumah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_rumah' => $row->id_rumah,
		'id_komplek' => $row->id_komplek,
		'blok' => $row->blok,
		'nomer' => $row->nomer,
	    );
            $this->template->load('template','tbl_rumah/tbl_rumah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_rumah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_rumah/create_action'),
            'id_rumah' => set_value('id_rumah'),
            'id_komplek' => set_value('id_komplek'),
            'blok' => set_value('blok'),
            'nomer' => set_value('nomer'),
	);
        $this->template->load('template','tbl_rumah/tbl_rumah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $id_komplek = $this->input->post('id_komplek', TRUE);
            $blok = $this->input->post('blok', TRUE);
            $nomer = $this->input->post('nomer', TRUE);

            // Cek duplikasi
            if ($this->Tbl_rumah_model->is_duplicate($id_komplek, $blok, $nomer)) {
                $this->session->set_flashdata('message', 'Data Rumah Sudah Ada !');
                redirect(site_url('tbl_rumah/create'));
            } else {
                $data = array(
                    'id_komplek' => $id_komplek,
                    'blok' => $blok,
                    'nomer' => $nomer,
                    'status' => 0,
                );

                $this->Tbl_rumah_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('tbl_rumah'));
            }
        }
    }

    
    public function update($id) 
    {
        $row = $this->Tbl_rumah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_rumah/update_action'),
                'id_rumah' => set_value('id_rumah', $row->id_rumah),
                'id_komplek' => set_value('id_komplek', $row->id_komplek),
                'blok' => set_value('blok', $row->blok),
                'nomer' => set_value('nomer', $row->nomer),
	    );
            $this->template->load('template','tbl_rumah/tbl_rumah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_rumah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rumah', TRUE));
        } else {
            $data = array(
            'id_komplek' => $this->input->post('id_komplek',TRUE),
            'blok' => $this->input->post('blok',TRUE),
            'nomer' => $this->input->post('nomer',TRUE),
	    );

            $this->Tbl_rumah_model->update($this->input->post('id_rumah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_rumah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_rumah_model->get_by_id($id);

        if ($row) {
            $this->Tbl_rumah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_rumah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_rumah'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_komplek', 'id komplek', 'trim|required');
        $this->form_validation->set_rules('blok', 'blok', 'trim|required');
        $this->form_validation->set_rules('nomer', 'nomer', 'trim|required');

        $this->form_validation->set_rules('id_rumah', 'id_rumah', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_rumah.php */
/* Location: ./application/controllers/Tbl_rumah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-07-24 04:59:00 */
/* http://harviacode.com */