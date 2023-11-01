<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Procesos_model");
	}
	
	// Vista principal
	// public function index($idusu, $token) {
	// 	verifica_sesion( $idusu, $token );
	// 	$this->load->view( "Inicio_view" );
	// } 

	public function index() {
		echo "<h3>Acceso no autorizado</h3>";
	}

	public function inicio($matricula, $nompersona, $appaterno, $apmaterno) {
		$this->creasesion($matricula, $nompersona, $appaterno, $apmaterno);
        redirect(base_url()."welcome/portal");
	}

	public function inicio2($usuario, $nombre, $paterno, $materno) {
		$this->creasesion($usuario, $nombre, $paterno, $materno);
        redirect(base_url()."welcome/portal");
	}

	public function portal(){
		if (sesion_valida(session_id())) {
			// Si la sesión es valida me manda al inicio
            $this->load->view("Inicio_view");
        } else {
			// Si la sesión no es valida me redirecciona al login
            redirect(base_url());
        }
	}

	public function creasesion($matricula, $nompersona, $appaterno, $apmaterno) {
		//crear sesion
		$this->session->set_userdata("matricula", $matricula);
		// rawurldecode — Decodificar cadenas codificadas estilo URL 
		$this->session->set_userdata("nompersona", rawurldecode($nompersona));
		$this->session->set_userdata("appaterno", rawurldecode($appaterno));
		$this->session->set_userdata("apmaterno", rawurldecode($apmaterno));
	}

	public function creasesion2($usuario, $nombre, $paterno, $materno) {
		//crear sesion
		$this->session->set_userdata("usuario", $usuario);
		// rawurldecode — Decodificar cadenas codificadas estilo URL 
		$this->session->set_userdata("nombre", rawurldecode($nombre));
		$this->session->set_userdata("paterno", rawurldecode($paterno));
		$this->session->set_userdata("materno", rawurldecode($materno));
	}

	public function getmodulos() {
		$data    = $this->Procesos_model->get_modulos();
		$obj["resultado"] = $data != NULL;
		if ($obj["resultado"]) {
			$obj["mensaje"] = "Se encontraron " . count($data) . " módulo(s)";
			$obj["modulos2"] = $data;
		} else {
			$obj["mensaje"] = "No se encontraron módulos";
		}
		echo json_encode($obj);
	}

	public function getprocesos()
	{
		$idmod   = $this->input->post("idmod") != NULL ? $this->input->post("idmod") : 0;
		$nomproceso  = $this->input->post("modulo") != NULL ? $this->input->post("nomproceso") : "";
		$data = $this->Procesos_model->get_procesos($idmod, $nomproceso);
		$obj["resultado"] = $data != NULL;
		if ($obj["resultado"]) {
			$obj["mensaje"] = "Se encontraron " . count($data) . " proceso(s)";
			$obj["tipos"]   = $data;
		} else {
			$obj["mensaje"] = "No se encontraron procesos";
		}
		echo json_encode($obj);
	}

	public function getdatos()
	{
		$idproceso   = $this->input->post("idproceso") != NULL ? $this->input->post("idproceso") : 0;
		$dato1  = $this->input->post("dato1") != NULL ? $this->input->post("dato1") : "";
		$dato2  = $this->input->post("dato2") != NULL ? $this->input->post("dato2") : "";
		$dato3  = $this->input->post("dato3") != NULL ? $this->input->post("dato3") : "";
		$data = $this->Procesos_model->get_datos($idproceso, $dato1, $dato2, $dato3);
		$obj["resultado"] = $data != NULL;
		if ($obj["resultado"]) {
			$obj["mensaje"] = "Se encontraron " . count($data) . " dato(s)";
			$obj["dato"]   = $data;
		} else {
			$obj["mensaje"] = "No se encontraron datos";
		}
		echo json_encode($obj);
	}

	public function insertamodulo() {
		$idmod  = $this->input->post("idmod");
		$modulo = $this->input->post("modulo");
		$icon   = $this->input->post("icon");

		$data = array(
			
			"idmod"  => $idmod,
			"modulo" => $modulo,
			"icon"   => $icon
	
		);

		$obj["idmod"] = $this->Procesos_model->insert_modulos($data);
			$obj["resultado"] = $obj["idmod"] !=0;
			$obj["mensaje"] = $obj["resultado"] ?
			"Módulo insertado" : "No se inserto el módulo";
			
		echo json_encode($obj);
	}

	// Intento de insertar en tablas foraneas
	public function insert() {
		$idmod  = $this->input->post("idmod");
		$modulo = $this->input->post("modulo");
		$icon   = $this->input->post("icon");

		$data = array(
			
			"idmod"  => $idmod,
			"modulo" => $modulo,
			"icon"   => $icon
	
		);

		$obj["idmod"] = $this->Procesos_model->insert_modulos($data);
			$obj["resultado"] = $obj["idmod"] !=0;
			$obj["mensaje"] = $obj["resultado"] ?
			"Módulo insertado" : "No se inserto el módulo";
			
		echo json_encode($obj);
	}

	public function borrarmodulo(){
		
		// borrar por get $idpromocion
		
		$idmod = $this->input->post("idmod");
		
		
		$obj["resultado"] = $this->Procesos_model->delete_modulo($idmod);
		$obj["mensaje"] = $obj["resultado"] ?
		"Promocion Eliminada" : "No se pudo eliminar el módulo";
		echo json_encode($obj);
	
	}

	public function administrador() {
		$this->load->view( "admin_view" );
	}
	
}


