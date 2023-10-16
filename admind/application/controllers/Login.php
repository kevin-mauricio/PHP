<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('LoginModel');
		$this->load->library('session');
		$this->load->database();
	}
	public function index()
	{
		$this->load->view('Login/login');
	}

	public function validar_datos()
	{
		if ($this->input->server("REQUEST_METHOD") == "POST") {
			$data["correo"] = $this->input->post("correo");
			$data["passw"] = $this->input->post("passw");
			$respuesta = $this->LoginModel->validar_ingreso($data["correo"]);

			$alerta = array(); // Inicializar la variable de alerta}

			if (!empty($respuesta)) {
				if ($respuesta->correo === $data['correo'] && $respuesta->passw == $data['passw']) {
					// Inicio de sesión exitoso
					$this->session->set_userdata('correo', $data['correo']);
					$alerta = array(
						'mensaje' => 'Bienvenido(a) ',
						'color' => 'info'
					);
					redirect(base_url('inicio'), "refresh");
				} else {
					// Contraseña incorrecta
					$alerta = array(
						'mensaje' => 'La contraseña es incorrecta.',
						'color' => 'warning'
					);
				}
			} else {
				// El usuario no existe
				$alerta = array(
					'mensaje' => 'El usuario no existe.',
					'color' => 'danger'
				);
			}

			$this->session->set_flashdata('alerta', $alerta);
		}

		$this->load->view('Login/login');
	}


	public function logOut()
	{
		$this->session->sess_destroy();

		redirect("Login/index", "refresh");
	}



}