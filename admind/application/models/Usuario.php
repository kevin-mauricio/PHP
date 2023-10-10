<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

    public $table = 'usuarios';
    public $table_id = 'id_usuario';
    public $correo = 'correo';
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Usuario');
        $this->load->database();
    }
    
    public function insert($data){
        
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
           
      
    }

    public function selectAllUsuarios(){
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result();
    }

    public function selectUsuario($id_usuario){
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id, $id_usuario);

        $query = $this->db->get();
        return $query->row();
    }
    public function selectUsuarioByCorreo($correo){
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->correo, $correo);

        $query = $this->db->get();
        return $query->row();
    }

    public function updateUsuario($id_usuario, $data){
        $this->db->where($this->table_id, $id_usuario);
        $this->db->update($this->table, $data);
    }

    public function deleteUsuario($id_usuario){
        $this->db->where($this->table_id, $id_usuario);
        $this->db->delete($this->table);
    }
}
