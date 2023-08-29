<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas extends CI_Controller {

	Public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Persona');
        $this->load->database();
    }


	public function index()
	{
		echo "Probando...";
	}

    public function listado()
    {
    
    }

    public function guardar(){
        $this->load->view('Personas/guardar');
        
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            // Obtén los valores de los campos del formulario
            $data["nombre"] = $this->input->post("nombre");
            $data["apellido"] = $this->input->post("apellido");
            $data["edad"] = $this->input->post("edad");
            $data["genero"] = $this->input->post("genero");
            $data["estado_civil"] = $this->input->post("estado_civil");
            $data["habilidades"] = $this->input->post("habilidades");
        
            // Verifica que los campos requeridos no sean nulos
            if (
                $data["nombre"] !== null &&
                $data["apellido"] !== null &&
                $data["edad"] !== null &&
                $data["genero"] !== null &&
                $data["estado_civil"] !== null &&
                $data["habilidades"] !== null
            ) {
                // Inserta los datos en la base de datos
                $this->Persona->insert($data);
            } else {
                // Alguno de los campos requeridos es nulo, muestra un mensaje de error
                echo "Todos los campos requeridos deben estar llenos.";
            }
        }
        
    }

    public function borrar()
    {

    }
}
