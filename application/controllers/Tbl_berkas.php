<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_berkas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_berkas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_berkas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_berkas/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_berkas/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_berkas_model->total_rows($q);
        $tbl_berkas = $this->Tbl_berkas_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_berkas_data' => $tbl_berkas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'tbl_berkas/tbl_berkas_list', $data);
    }

    public function read($id)
    {
        $row = $this->Tbl_berkas_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_berkas' => $row->id_berkas,
                'kode_booking' => $row->kode_booking,
                'nama' => $row->nama,
                'nik' => $row->nik,
                'pekerjaan' => $row->pekerjaan,
                'tanggal_booking' => $row->tanggal_booking,
                'status' => $row->status,
            );
            $this->template->load('template', 'tbl_berkas/tbl_berkas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_berkas'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_berkas/create_action'),
            'id_berkas' => set_value('id_berkas'),
            'kode_booking' => set_value('kode_booking'),
            'nama' => set_value('nama'),
            'nik' => set_value('nik'),
            'bi_checking' => set_value('bi_checking'),
            'pekerjaan' => set_value('pekerjaan'),
            'tanggal_booking' => set_value('tanggal_booking'),
            'status' => set_value('status'),
        );
        $this->template->load('template', 'tbl_berkas/tbl_berkas_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kode_booking' => $this->input->post('kode_booking', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'nik' => $this->input->post('nik', TRUE),
                'pekerjaan' => $this->input->post('pekerjaan', TRUE),
                'tanggal_booking' => date('Y-m-d'),
                'status' => 'Proses Pengumpulan',
                'id_users' => $this->session->userdata('id_users'),
                'bi_checking' => $this->input->post('bi_checking', TRUE),
            );


            $this->Tbl_berkas_model->insert($data);
            $this->session->set_flashdata('message', 'Input Data BERHASIL !');
            redirect(site_url('tbl_berkas'));
        }
    }

    public function update($id)
    {
        $row = $this->Tbl_berkas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_berkas/update_action'),
                'id_berkas' => set_value('id_berkas', $row->id_berkas),
                'bi_checking' => set_value('bi_checking', $row->bi_checking),
                'kode_booking' => set_value('kode_booking', $row->kode_booking),
                'nama' => set_value('nama', $row->nama),
                'nik' => set_value('nik', $row->nik),
                'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
                'tanggal_booking' => set_value('tanggal_booking', $row->tanggal_booking),
                'status' => set_value('status', $row->status),
            );
            $this->template->load('template', 'tbl_berkas/tbl_berkas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_berkas'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_berkas', TRUE));
        } else {
            $data = array(
                'kode_booking' => $this->input->post('kode_booking', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'nik' => $this->input->post('nik', TRUE),
                'pekerjaan' => $this->input->post('pekerjaan', TRUE),
                'bi_checking' => $this->input->post('bi_checking', TRUE),
            );

            $this->Tbl_berkas_model->update($this->input->post('id_berkas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_berkas'));
        }
    }

    public function simpan_syarat() {
        $ceklis = implode(',', $this->input->post('id_syarat'));
        $data = array(
            'ceklis' => $ceklis,
        );
        $this->Tbl_berkas_model->update($this->input->post('id_berkas', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Ceklis Success');
        redirect(site_url('tbl_berkas'));
    }

    public function delete($id)
    {
        $row = $this->Tbl_berkas_model->get_by_id($id);

        if ($row) {
            $this->Tbl_berkas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_berkas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_berkas'));
        }
    }

    

    public function _rules()
    {
        $this->form_validation->set_rules('kode_booking', 'kode booking', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('nik', 'nik', 'trim|required');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
        //$this->form_validation->set_rules('tanggal_booking', 'tanggal booking', 'trim|required');
        //$this->form_validation->set_rules('status', 'status', 'trim|required');

        $this->form_validation->set_rules('id_berkas', 'id_berkas', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_berkas.php */
/* Location: ./application/controllers/Tbl_berkas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-05-27 08:39:22 */
/* http://harviacode.com */