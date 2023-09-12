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
		$this->load->view('/products/products_list', $vdata);
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

	public function info($serial_id = null)
	{
		$product = $this->Product->find($serial_id);

		if (isset($product)) {
			$data["serial_id"] = $product->serial_id;
			$data["name"] = $product->nombre;
			$data["description"] = $product->descripcion;
			$data["cost"] = $product->costo;
			$data["price"] = $product->precio;
			$data["amount"] = $product->cantidad;
		}
		$this->load->view('/products/info', $data);
	}

	public function edit($serial_id = null)
	{
		if (isset($serial_id)) {
			$product = $this->Product->find($serial_id);

			if (isset($product)) {
				$data["serial_id"] = $product->serial_id;
				$data["name"] = $product->nombre;
				$data["description"] = $product->descripcion;
				$data["cost"] = $product->costo;
				$data["price"] = $product->precio;
				$data["amount"] = $product->cantidad;
			}
		}

		if ($this->input->server("REQUEST_METHOD") == "POST") {
			// getting form values
			$data_update["nombre"] = $this->input->post("name");
			$data_update["descripcion"] = $this->input->post("description");
			$data_update["costo"] = $this->input->post("cost");
			$data_update["precio"] = $this->input->post("price");
			$data_update["cantidad"] = $this->input->post("amount");

			$this->Product->update($serial_id ,$data_update);
			redirect("/products");
		}
		$this->load->view('/products/edit', $data);
	}

	public function delete($serial_id = null)
	{
		$this->Product->delete($serial_id);
		redirect("/products");
	}

}