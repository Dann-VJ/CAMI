<?php
class Acceso extends CI_Controller {

	public function index() {
		$this->load->view("Login_view");
	}

	// public function iniciosesion($idusu = 0, $matricula, $token) {

	// 	if ($idusu == 0 || trim($matricula) == "") {
	// 		mensaje_usuario("danger", "Debes iniciar sesión"); 
	// 		redirect(base_url());
	// 	}

	// 	$this->session->set_userdata(array(
	// 		"idusu" 	=> $idusu,
	// 		//"nombre"  => rawurldecode($nombre),
	// 		"matricula" => $matricula,
	// 		"token"     => $token
	// 	));
		
	// 	mensaje_usuario("dark", "Bienvenido aaaaaaaaaaaa");
	// 	redirect(base_url()."welcome/portal/".("$idusu/$token"));
	// }

	public function cierrasesion($idusu = 0, $token = "") {
		if ($idusu != 0 && $token != "") {
			sesion_valida($idusu, $token);
		}

		$this->session->unset_userdata(array(
			"idusu",
			"nombre",
			"matricula",
			"token"
		));
		$this->session->sess_destroy();
		mensaje_usuario("dark", "Nos vemos pronto");

		redirect(base_url());
	}

	// public function login( $ruta = "" ){
	// 	$this->load->view( "Login_view", array( "ruta" => $ruta ) );
	// }
}
?>