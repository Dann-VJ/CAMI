<?php
    class Usuarios extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model( "Usuarios_model" );
            $this->output->set_content_type( "application/json" );
        }

        public function index() {
            echo "<h3>Acceso no permitido</h3>";
        }
        
        // Inicio de sesión 
        public function acceso() {
            $matricula  = $this->input->post( "matricula" );
            $contrasena = $this->input->post( "contrasena" );   
            $data = array(
                "matricula"  => $matricula,
                "contrasena" => $contrasena
            );
    
            $row = $this->Usuarios_model->acceso_usuario( $data );
            $obj[ "resultado" ] = $row != NULL;
            $obj[ "mensaje" ]   = $obj[ "resultado" ] ?
                    "Acceso autorizado" : "Lo sentimos, las credenciales que estás usando no son válidas";
            if ( $obj[ "resultado" ] ) {
                $obj[ "usuario" ] = $row;
    
                // Crea token
                session_regenerate_id();
                $token = md5( session_id() );
                $this->Usuarios_model->update_token( $row->idusu, $token );
                $obj[ "token" ]   = $token;
            }
            echo json_encode( $obj );
        }


    }
?>