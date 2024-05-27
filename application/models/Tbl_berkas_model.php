<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_berkas_model extends CI_Model
{

    public $table = 'tbl_berkas';
    public $id = 'id_berkas';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_syarat()
    {
        $this->db->order_by('id_syarat', 'ASC');
        return $this->db->get('tbl_syarat')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_berkas', $q);
	$this->db->or_like('kode_booking', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('tanggal_booking', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_berkas', $q);
	$this->db->or_like('kode_booking', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('tanggal_booking', $q);
	$this->db->or_like('status', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Tbl_berkas_model.php */
/* Location: ./application/models/Tbl_berkas_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-05-27 08:39:22 */
/* http://harviacode.com */