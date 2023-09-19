<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		// $this->load->helper('url');
		// $this->load->model('User');
		// $this->load->library('session');
		$this->load->database();
	}
	public function index()
	{
		$this->load->view('/login/login');
	}
}