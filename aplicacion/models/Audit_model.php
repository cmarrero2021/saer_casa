<?php
class Audit_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	public function auditar() {
		$usuario = $this->session->userdata('usuario');
		$ci_usuario = $this->session->userdata('cedula');
		$nombre_usuario = $this->session->userdata('nombre_usuario');
		$this->db->query("SET application_name TO 'Sistema de Control de Visitas'");
		$this->db->query('SET session "scv.user" = "'.$usuario.'" ');
		$this->db->query('SET session "scv.ci_usuario" = "'.$ci_usuario.'" ');
		$this->db->query('SET session "scv.nombre_usuario" = "'.$nombre_usuario.'" ');
		$this->db->query('SET session "scv.ip" = "'.$_SERVER['REMOTE_ADDR'].'" ');		
	}
}
?>
