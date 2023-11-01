<?php
/*
	Archivo: sesiones_helper.php
	Ubicación: application/helpers
*/

function sesion_valida() {
    $misitio = &get_instance();
    return(
        $misitio->session->has_userdata("matricula") || $misitio->session->has_userdata("usuario")
    );
}

?>