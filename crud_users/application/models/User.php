<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{

    public $table = 'users';
    public $table_id = 'id_user';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('User');
        $this->load->database();
    }

    public function select() {
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();

        return $query->result();
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->trans_status();
    }

}