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
			redirect(base_url(), 'refresh');
		} else {
			$vdata["usuarios"] = $this->Usuario->selectAllUsuarios();

			$correo = $this->session->userdata('correo');
			$usuario = $this->Usuario->selectUsuarioByCorreo($correo);

			$this->session->set_userdata('usuario', $usuario);

			// if ($usuario->rol == 'admin') {
			// 	$this->load->view('Dashboard/listaUsuarios', $vdata);
			// } else {
			// }
			$this->load->view('Dashboard/inicio', $vdata);
		}
	}
	public function consultarUsuarios()
	{
		if (!$this->session->userdata('correo')) {
			redirect('Login/index', 'refresh');
		} else {
			$vdata["usuarios"] = $this->Usuario->selectAllUsuarios();

			$correo = $this->session->userdata('correo');
			$usuario = $this->Usuario->selectUsuarioByCorreo($correo);

			$this->session->set_userdata('usuario', $usuario);

			// if ($usuario->rol == 'admin') {
			// 	$this->load->view('Dashboard/listaUsuarios', $vdata);
			// } else {
			// }
			$this->load->view('Dashboard/listaUsuarios', $vdata);
		}
	}

	public function crear_usuario()
	{
		if (!$this->session->userdata('correo')) {

			redirect('Login/index', 'refresh');
		} else {
			$correo = $this->session->userdata('correo');
			$usuario = $this->Usuario->selectUsuarioByCorreo($correo);

			$usuario = $this->session->userdata('usuario');

			if ($usuario->rol == 'admin') {
				$vdata["nombre"] = $vdata["passw"] = $vdata["correo"] = "";
				if ($this->input->server("REQUEST_METHOD") == "POST") {
					$data["nombre"] = $this->input->post("nombre");
					$data["passw"] = $this->input->post("passw");
					$data["correo"] = $this->input->post("email");
					$data["rol"] = $this->input->post("rol");
					$this->Usuario->insert($data);
					$this->crearAlerta('info', 'Usuario creado correctamente.');
					redirect(base_url('consultar-usuario'), "refresh");
				}
				$this->load->view('Dashboard/crear', $vdata);
			} else {
				$this->crearAlerta('danger', 'No tienes permisos para esta acción.');
				$this->load->view('Dashboard/vistaProtegida');

			}
		}
	}
	public function vistaProtegida()
	{
		if (!$this->session->userdata('correo')) {

			redirect('Login/index', 'refresh');
		} else {
			$this->crearAlerta('danger', 'No tienes permisos para esta acción.');
			$this->load->view('Dashboard/vistaProtegida');
		}
	}
	public function verPerfil()
	{
		if (!$this->session->userdata('correo')) {
			redirect('Login/index', 'refresh');
		} else {
			$this->load->view('Dashboard/perfil');
		}
	}


	public function modificar_usuario($id_usuario = null)
	{
		if (!$this->session->userdata('correo')) {

			redirect('Login/index', 'refresh');
		} else {
			$usuario = $this->session->userdata('usuario');
			if ($usuario->rol == 'admin') {
				$vdata["nombre"] = $vdata["passw"] = $vdata["correo"] = $vdata["rol"] = "";
				if (isset($id_usuario)) {
					$usuario = $this->Usuario->selectUsuario($id_usuario);
					if (isset($usuario)) {
						$vdata["nombre"] = $usuario->nombre;
						$vdata["passw"] = $usuario->passw;
						$vdata["correo"] = $usuario->correo;
						$vdata["rol"] = $usuario->rol;
						if ($this->input->server("REQUEST_METHOD") == "POST") {
							$data["nombre"] = $this->input->post("nombre");
							$data["passw"] = $this->input->post("passw");
							$data["correo"] = $this->input->post("email");
							$data["rol"] = $this->input->post("rol");
							//----------------------------------------------
							$vdata["nombre"] = $this->input->post("nombre");
							$vdata["passw"] = $this->input->post("passw");
							$vdata["correo"] = $this->input->post("correo");
							$vdata["rol"] = $this->input->post("rol");

							$this->Usuario->updateUsuario($id_usuario, $data);
							$this->crearAlerta('info', 'Usuario modificado correctamente.');
							redirect(base_url('consultar-usuario'), "refresh");
						}
						$this->load->view('Dashboard/modificar', $vdata);

					}
				}
			} else {
				$this->crearAlerta('danger', 'No tienes permisos para esta acción.');
				$this->load->view('Dashboard/vistaProtegida');
			}
		}

	}

	public function borrar_usuario($id_usuario = null)
	{
		if (!$this->session->userdata('correo')) {
			redirect('Login/index', 'refresh');
		} else {
			$usuario = $this->session->userdata('usuario');
			if ($usuario->rol == 'admin') {
				$this->Usuario->deleteUsuario($id_usuario);
				$this->crearAlerta('info', 'Usuario eliminado correctamente.');
				redirect(base_url('consultar-usuario'), "refresh");
			} else {
				$this->load->view('Dashboard/vistaProtegida');
			}
		}
	}

	public function actualizarDatos()
	{
		if (!$this->session->userdata('correo')) {
			redirect('Login/index', 'refresh');
		} else {
			$usuario = $this->session->userdata('usuario');
			if (isset($usuario)) {
				if ($this->input->server("REQUEST_METHOD") == "POST") {
					$data["nombre"] = $this->input->post("nombre");

					$this->Usuario->updateUsuario($usuario->id_usuario, $data);
					$this->crearAlerta('success', 'Datos personales actualizados.');
					redirect(base_url('inicio'), "refresh");
				}
				$this->load->view('Dashboard/perfil');
			}
		}

	}
	public function validarContrasena()
	{
		if (!$this->session->userdata('correo')) {
			redirect('Login/index', 'refresh');
		} else {
			$usuario = $this->session->userdata('usuario');
			if (isset($usuario)) {
				if ($this->input->server("REQUEST_METHOD") == "POST") {
					$data["pass_old"] = $this->input->post("pass_old");
					if ($data["pass_old"] == $usuario->passw) {
						$this->session->set_flashdata('pass_old', $data['pass_old']);
						$this->crearAlerta('info', 'Ingresa la nueva contraseña.');
					} else {
						// codigo si no es correcta la contraseña
						$this->crearAlerta('warning', 'La contraseña no es correcta');
					}

				}
				$this->load->view('Dashboard/perfil');
			}
		}

	}
	public function cambiarContrasena()
	{
		if (!$this->session->userdata('correo')) {
			redirect('Login/index', 'refresh');
		} else {
			$usuario = $this->session->userdata('usuario');
			if (isset($usuario)) {
				if ($this->input->server("REQUEST_METHOD") == "POST") {
					$data["pass_new"] = $this->input->post("pass_new");
					$data["pass_confir"] = $this->input->post("pass_confir");
					if ($data["pass_new"] == $data["pass_confir"]) {
						$data_new['passw'] = $data["pass_new"];
						$this->Usuario->updateUsuario($usuario->id_usuario, $data_new);
						$this->crearAlerta('success', 'Contraseña actualizada correctamente.');
						redirect(base_url('inicio'), 'refresh');
					} else {
						$this->crearAlerta('warning', 'Las contraseñas no coinciden.');
					}
				}
				$this->load->view('Dashboard/perfil');
			}
		}

	}

	public function crearAlerta($color, $mensaje)
	{
		$alerta = [
			'color' => $color,
			'mensaje' => $mensaje
		];
		$this->session->set_flashdata('alerta', $alerta);
	}
}