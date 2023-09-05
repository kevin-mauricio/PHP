<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persona extends CI_Model
{

    public $table = 'personas';
    public $table_id = 'persona_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Persona');
        $this->load->database();
    }


    public function index()
    {

    }

    public function listado()
    {

    }

    public function guardar()
    {


    }

    public function borrar()
    {

    }

    function find($id)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id, $id);

        $query = $this->db->get();
        return $query->row();
    }

    /* [ generar una consulta ] */
    function findAll()
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