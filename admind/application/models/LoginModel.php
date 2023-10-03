<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    public $table = 'usuarios';
    public $table_id = 'id_usuario';

    public $correo = 'correo';
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('LoginModel');
        $this->load->database();
    }
    
    public function validar_ingreso($ingreso) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->correo, $ingreso);

        $query = $this->db->get();
        return $query->row();
    } 

}
