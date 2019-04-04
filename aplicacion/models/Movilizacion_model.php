<?php
class Movilizacion_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		// $this->load->model('Audit_model', 'auditoria');
		// $this->auditoria->auditar();
	}
	public function listar_movilizacion() {
		return $this->db->query("SELECT * FROM movilizaciones ORDER BY id_movilizacion");
	}
	public function guardar($data)	{
		foreach($data as $var => $val) {
			$$var = $val;
		}
		$sql = "INSERT INTO tipo_aeropuertos (tipo_aeropuerto) values ($tipo_aeropuerto)";
		$this->db->query($sql);
		return true;
	}
	public function actualizar($where, $data) {
		foreach($data as $var => $val) {
			$$var = $val;
		}		
		foreach($data as $var => $val) {
			$$var = $val;
		}
		$sql = "UPDATE tipo_aeropuertos SET id_tipo_aeropuerto = $id_tipo_aeropuerto, tipo_aeropuerto = $tipo_aeropuerto WHERE id_tipo_aeropuerto = $id_tipo_aeropuerto";
		$this->db->query($sql);
		return true;
	}
	public function borar_por_id($id) {
		$sql = "DELETE FROM tipo_aeropuertos WHERE id_tipo_aeropuerto = $id";
		$this->db->query($sql);
	}
	public function get_by_id($id) {
		$query = $this->db->query("SELECT id_tipo_aeropuerto,tipo_aeropuerto FROM tipo_aeropuertos a  WHERE id_tipo_aeropuerto = $id")->row();
		return $query;
	}
	public function auditoria() {
		// $usuario = $this->session->userdata('usuario');
		// $this->db->query("SET application_name TO 'Sistema de Control de Visitas'");
		// $this->db->query('SET session "scv.user" = "'.$usuario.'" ');
		// $this->db->query('SET session "scv.ip" = "'.$_SERVER['REMOTE_ADDR'].'" ');		

	}	
}