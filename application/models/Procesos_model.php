<?php
class Procesos_model extends CI_Model {
    public function get_modulos() {
		$this->db->order_by( "idmod" );
		$rs = $this->db->get( "modulos" );
		return $rs->num_rows() == 0 ? NULL : $rs->result();
	}

	public function get_procesos($idmod, $nomproceso, $procesos = NULL) {
		$this->db->select( "p.*, modulo" );
		$this->db->from( "procesos AS p" );
		$this->db->join( "modulos AS m", "m.idmod = p.idmod", "left" );
		if ( $nomproceso != "" ) {
			$this->db->like( "nomproceso", $nomproceso );
		}
		if ( $idmod != 0 ) {
			$this->db->where( "p.idmod", $idmod );
		}
		if ( $procesos != NULL ) {
			$this->db->where_in( "p.idproducto", array_keys( $procesos ) );
		}

		$this->db->order_by( "p.nomproceso" );
		$rs = $this->db->get();
		return $rs->num_rows() == 0 ? NULL : $rs->result();
	}

	public function get_datos($idproceso, $dato1, $dato2, $dato3, $datos = NULL) {
		$this->db->select( "d.*, nomproceso" );
		$this->db->from( "datos AS d" );
		$this->db->join( "procesos AS p", "p.idproceso = d.idproceso", "left" );
		if ( $dato1 != "" ) {
			$this->db->like( "dato1", $dato1 );
		}
		if ( $dato2 != "" ) {
			$this->db->like( "dato2", $dato2 );
		}
		if ( $dato3 != "" ) {
			$this->db->like( "dato3", $dato3 );
		}
		if ( $idproceso != 0 ) {
			$this->db->where( "d.idproceso", $idproceso );
		}
		if ( $datos != NULL ) {
			$this->db->where_in( "p.idproducto", array_keys( $datos ) );
		}

		$this->db->order_by( "nomproceso" );
		$rs = $this->db->get();
		return $rs->num_rows() == 0 ? NULL : $rs->result();
	}

	// CRUD para el administrador
	public function insert_modulos($data) {
		$this->db->set($data);
		$this->db->insert("modulos");
		return $this->db->insert_id();
	}

	// ---- Prueba de insertar primary and foreing key ----
	public function insert_prueba($data) {
		$this->db->query("insert into modulos (modulo, icon) values ('$data')");
		return $this->db->insert_id();

		$this->db->query("insert into procesos (nomproceso) values ('$data')");
	}

	public function delete_modulo( $idmod ) {
        $this->db->where( "idmod", $idmod);
        $this->db->delete( "modulos" );
        return $this->db->affected_rows() > 0;
    }
    
}
?>