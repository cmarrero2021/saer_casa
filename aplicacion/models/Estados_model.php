<?php
class Estados_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		// $this->load->model('Audit_model', 'auditoria');
		// $this->auditoria->auditar();
	}
	public function listar_estado() {
		return $this->db->query("SELECT id_estado,estado FROM estados ORDER BY id_estado");
	}
	public function get_by_id($id) {
		$query = $this->db->query("SELECT id_estado,estado FROM estados WHERE id_estado = $id")->row();
		return $query;
	}
	public function get_estado() {
		$query = $this->db->select('id_estado, estado')->order_by('id_estado')->get('estados')->result_array();
		$estados=array();
		foreach ($query as $r) {
			$estados[$r["id_estado"]] = $r['estado'];	
		}
		return $estados;
	}

	public function auditoria() {
		// $usuario = $this->session->userdata('usuario');
		// $this->db->query("SET application_name TO 'Sistema de Control de Visitas'");
		// $this->db->query('SET session "scv.user" = "'.$usuario.'" ');
		// $this->db->query('SET session "scv.ip" = "'.$_SERVER['REMOTE_ADDR'].'" ');		

	}	
}