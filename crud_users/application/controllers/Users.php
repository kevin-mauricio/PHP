<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User');
		$this->load->library('session');
		$this->load->database();
	}
	public function index()
	{
		$data['users'] = $this->User->select();
		echo 'holaa';	
		$this->load->view('/users/users_list', $data);
	}

	public function add()
	{
		if ($this->input->server("REQUEST_METHOD") == "POST") {
			$user_name = $this->input->post("name");
			$data["name_user"] = $user_name;
			$data["pword_user"] = $this->input->post("passw");
			$data["email_user"] = $this->input->post("email");

			$status = $this->User->insert($data); // insert() retorna un estado

			if ($status) {
				$alert = array(
					'message' => "User ".$user_name." successfully added.",
					'color' => 'success'
				);
			} else {
				$alert = array(
					'message' => "There was an error, please try again.",
					'color' => 'danger'
				);
			}
			$this->session->set_flashdata('alert', $alert);

		}

		$this->load->view('/users/add');
	}
}