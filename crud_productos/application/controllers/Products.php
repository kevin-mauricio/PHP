<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Product');
		$this->load->database();
	}

	public function index()
	{
        $vdata["products"] = $this->Product->select();
		$this->load->view('/products/products_list' , $vdata);
	}

	public function add()
	{
		if ($this->input->server("REQUEST_METHOD") == "POST") {
			// getting form values
			$data["nombre"] = $this->input->post("name");
			$data["descripcion"] = $this->input->post("description");
			$data["costo"] = $this->input->post("cost");
			$data["precio"] = $this->input->post("price");
			$data["cantidad"] = $this->input->post("amount");
			
			$this->Product->insert($data);
		}

		$this->load->view('/products/add');
	}

	public function info($serial_id = null) {
		$product = $this->Product->find($serial_id);
		
	}
}