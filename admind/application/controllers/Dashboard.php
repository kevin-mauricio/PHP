<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Usuario');
		$this->load->library('session');
		$this->load->database();
	}


	public function index()
	{
		if (!$this->session->userdata('correo')) {
			redirect('Login/index', 'refresh');
		} else {
			$vdata["usuarios"] = $this->Usuario->selectAllUsuarios();
			$this->load->view('Dashboard/plantilla', $vdata);
		}
	}

	public function crear_usuario()
	{
		if (!$this->session->userdata('correo')) {

			redirect('Login/index', 'refresh');
		} else {
			$vdata["nombre"] = $vdata["passw"] = $vdata["correo"] = "";
			if ($this->input->server("REQUEST_METHOD") == "POST") {
				$data["nombre"] = $this->input->post("nombre");
				$data["passw"] = $this->input->post("passw");
				$data["correo"] = $this->input->post("email");
				$this->Usuario->insert($data);
				redirect("Usuarios/index", "refresh");
			}
			$this->load->view('Usuarios/crear', $vdata);
		}
	}


	public function modificar_usuario($id_usuario = null)
	{
		if (!$this->session->userdata('correo')) {

			redirect('Login/index', 'refresh');
		} else {
			$vdata["nombre"] = $vdata["passw"] = $vdata["correo"] = "";
			if (isset($id_usuario)) {
				$usuario = $this->Usuario->selectUsuario($id_usuario);
				if (isset($usuario)) {
					$vdata["nombre"] = $usuario->nombre;
					$vdata["passw"] = $usuario->passw;
					$vdata["correo"] = $usuario->correo;
					if ($this->input->server("REQUEST_METHOD") == "POST") {
						$data["nombre"] = $this->input->post("nombre");
						$data["passw"] = $this->input->post("passw");
						$data["correo"] = $this->input->post("email");
						//----------------------------------------------
						$vdata["nombre"] = $this->input->post("nombre");
						$vdata["passw"] = $this->input->post("passw");
						$vdata["correo"] = $this->input->post("correo");

						$this->Usuario->updateUsuario($id_usuario, $data);
						redirect("Dashboard/index", "refresh");
					}
				}
			}
			$this->load->view('Dashboard/crear', $vdata);
		}

	}

	public function borrar_usuario($id_usuario = null)
	{
		if (!$this->session->userdata('correo')) {

			redirect('Login/index', 'refresh');
		} else {
			$this->Usuario->deleteUsuario($id_usuario);
			redirect("Usuarios/index", "refresh");
		}
	}

}