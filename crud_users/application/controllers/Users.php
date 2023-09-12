<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User');
		$this->load->database();
	}
	public function index()
	{
		$data['users'] = $this->User->select();
		$this->load->view('/users/users_list', $data);
	}

	public function add()
	{
		$this->load->view('/users/add');
	}
}

