<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Persona');
        $this->load->database();
    }


    public function index()
    {
        echo "Probando...";
    }

    public function listado()
    {
        $vdata["personas"] = $this->Persona->findAll();

        $this->load->view("personas/listado", $vdata);
    }

    public function guardar($persona_id = null)
    {
        $vdata["nombre"] = "";
        $vdata["apellido"] = "";
        $vdata["edad"] = "";
        $vdata["genero"] = "";
        $vdata["estado_civil"] = "";
        $vdata["php"] = "";
        $vdata["html"] = "";
        $vdata["python"] = "";
        $vdata["aws"] = "";
        if (isset($persona_id)) {
            $persona = $this->Persona->find($persona_id);

            if (isset($persona)) {
                $vdata["nombre"] = $persona->nombre;
                $vdata["apellido"] = $persona->apellido;
                $vdata["edad"] = $persona->edad;
                $vdata["genero"] = $persona->genero;
                $vdata["estado_civil"] = $persona->estado_civil;
                $vdata["php"] = $persona->php;
                $vdata["html"] = $persona->html;
                $vdata["python"] = $persona->python;
                $vdata["aws"] = $persona->aws;
            }
        }

        if ($this->input->server("REQUEST_METHOD") == "POST") {
            // Obtén los valores de los campos del formulario
            $data["nombre"] = $this->input->post("nombre");
            $data["apellido"] = $this->input->post("apellido");
            $data["edad"] = $this->input->post("edad");
            $data["genero"] = $this->input->post("genero");
            $data["estado_civil"] = $this->input->post("estado_civil");
            $data["php"] = $this->input->post("php");
            $data["html"] = $this->input->post("html");
            $data["python"] = $this->input->post("python");
            $data["aws"] = $this->input->post("aws");

            $vdata["nombre"] = $this->input->post("nombre");
            $vdata["apellido"] = $this->input->post("apellido");
            $vdata["edad"] = $this->input->post("edad");
            $vdata["genero"] = $this->input->post("genero");
            $vdata["estado_civil"] = $this->input->post("estado_civil");
            $vdata["php"] = $this->input->post("php");
            $vdata["html"] = $this->input->post("html");
            $vdata["python"] = $this->input->post("python");
            $vdata["aws"] = $this->input->post("aws");

            if (isset($persona_id)) {
                $this->Persona->update($persona_id, $data);
                //redirect('personas/listado');
            } else {
                // Verifica que los campos requeridos no sean nulos
                if (
                    $data["nombre"] !== null &&
                    $data["apellido"] !== null &&
                    $data["edad"] !== null &&
                    $data["genero"] !== null &&
                    $data["estado_civil"] !== null
                ) {
                    // Inserta los datos en la base de datos
                    $this->Persona->insert($data);
                } else {
                    // Alguno de los campos requeridos es nulo, muestra un mensaje de error
                    echo "Todos los campos requeridos deben estar llenos.";
                }
            }
        }
        $this->load->view('personas/guardar', $vdata);
    }

    public function ver($persona_id = null)
    {
        $persona = $this->Persona->find($persona_id);

        if (isset($persona)) {
            $vdata["nombre"] = $persona->nombre;
            $vdata["apellido"] = $persona->apellido;
            $vdata["edad"] = $persona->edad;
            $vdata["genero"] = $persona->genero;
            $vdata["estado_civil"] = $persona->estado_civil;
            $vdata["php"] = $persona->php;
            $vdata["html"] = $persona->html;
            $vdata["python"] = $persona->python;
            $vdata["aws"] = $persona->aws;
        } else {
            $vdata["nombre"] = $vdata["apellido"] = $vdata["edad"] = "";
        }
        $this->load->view('personas/ver', $vdata);
    }

    public function borrar($persona_id = null)
    {  
        $this->Persona->delete($persona_id);
        redirect('/personas/listado');
    }
}