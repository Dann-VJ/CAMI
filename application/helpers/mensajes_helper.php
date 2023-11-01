<?php
/*
	Archivo: mensajes_helper.php
	Ubicación: application/helpers
*/

function mensaje_usuario( $tipo, $mensaje ) {
	$miApp = &get_instance();
	$miApp->session->set_flashdata( "tipo",    $tipo );
	$miApp->session->set_flashdata( "mensaje", $mensaje );
}

function alerta( $tipo, $mensaje ) {
	switch( $tipo ) {
		case "success":
			$icono = "fa-check-circle";
			break;

		case "primary":
		case "secondary":
		case "light":
		case "dark":
		case "info":
			$icono = "fa-info-circle";
			break;

		case "warning":
			$icono = "fa-exclamation-triangle";
			break;

		case "danger":
			$icono = "fa-exclamation-circle";
			break;
		default:
			$icono = "";

	}
	echo 
		'<div class="row alert alert-' . $tipo . ' alert-dismissible fade show" role="alert"> 
			<div class="col-1"><i class="fas fa-2x ' . $icono . '"></i></div>
			<div class="col-11 text-center">' . $mensaje . '.</div>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
}
?>