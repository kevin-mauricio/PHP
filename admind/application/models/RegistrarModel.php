<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegistrarModel extends CI_Model
{

    public $table = 'usuarios';
    public $table_id = 'id_usuario';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('RegistrarModel');
        $this->load->database();
    }

    public function agregarUsuario($data)
    {
        $response = $this->db->insert($this->table, $data);
        $this->db->insert_id();
        return $response;
        
    }

}