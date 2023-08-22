<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Model {
    
    Public $table = 'personas';
    Public $table_id = 'personas_id';

	Public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
    }


	public function index()
	{
		
	}

    public function listado()
    {

    }

    public function guardar(){
        

    }

    public function borrar()
    {

    }

    public function insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}
