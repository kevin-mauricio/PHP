<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('RegistrarModel');
        $this->load->library('session');
        $this->load->database();
    }
    public function formularioRegistrar()
    {
        $this->load->view('login/registrar');
    }
    public function crearUsuario()
    {
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $data["correo"] = $this->input->post("email");
            $data["nombre"] = $this->input->post("name");
            $data["passw"] = $this->input->post("pass");

            $respuesta = $this->RegistrarModel->agregarUsuario($data);
            $alert = array(); // Inicializar la variable de alerta}

            if ($respuesta == 1) {
                $alert = array(
                    'mensaje' => 'Usuario '.$data['correo'].' registrado correctamente.',
                    'color' => 'success'
                );

            } else {
                $alert = array(
                    'mensaje' => 'El usuario ' . $data['correo'] . ' ya existe.',
                    'color' => 'warning'
                );
            }

            $this->session->set_flashdata('alert', $alert);
            $this->load->view('login/login');

        }

    }

}