<?php
class Auditoria_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	public function listar_auditoria() {
		return $this->db->query("SELECT id_auditoria,fecha_hora,usuario,ip,equipo,accion,tabla,sql,estado_previo,estado_actual FROM auditoria ORDER BY id_auditoria DESC ");
	}
	public function get_by_id($id) {
		$q=1;
		$query = $this->db->query("SELECT id_auditoria,fecha_hora,usuario,ip,equipo,accion,tabla,sql,estado_previo,estado_actual FROM auditoria where id_auditoria = $id")->row();
		return $query;
	}
}