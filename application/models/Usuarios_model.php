<?php
    class Usuarios_model extends CI_Model {

        public function acceso_usuario( $data ) {
            $this->db->where( "matricula", $data["matricula"] );
            $this->db->where( "contrasena LIKE BINARY", $data["contrasena"] ); 
            $rs = $this->db->get( "usuarios" );
            return $rs->num_rows() == 0 ? NULL : $rs->row();
        }

        public function update_token( $idusu, $token ) {
            $this->db->set( "token", $token );
            $this->db->where( "idusu", $idusu );
            $this->db->update( "usuarios" );
            return $this->db->affected_rows() > 0;
        }
    
        public function check_token( $idusu, $token ) {
            $this->db->where( "idusu", $idusu );
            $this->db->where( "token",     $token );
            $rs = $this->db->get( "usuarios" );
            return $rs->num_rows() > 0;
        }
    }
?>