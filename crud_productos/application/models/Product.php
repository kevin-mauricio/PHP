<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Model
{

    public $table = 'productos';
    public $table_id = 'serial_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Product');
        $this->load->database();
    }

    function find($serial_id)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id, $serial_id);

        $query = $this->db->get();
        return $query->row();
    }

    function select()
    {
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update($id, $data)
    {
        $this->db->where($this->table_id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
    }

}