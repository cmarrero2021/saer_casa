<?php
class Destino_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Audit_model', 'auditoria');
		$this->auditoria->auditar();
	}
	public function listar_destino() {
		return $this->db->query("SELECT a.id_destino,b.empresa,a.destino,a.abrev FROM destinos a LEFT JOIN empresas b ON b.id_empresa = a.id_empresa ORDER BY b.empresa,a.id_destino  ");
	}
	public function guardar($data)	{
		
		$em = $data["id_empresa"];
		$de = $data["destino"]; 
		$ab = $data["abrev"];
		$sql = "INSERT INTO destinos (id_empresa,destino,abrev) VALUES (".$data["id_empresa"].",'$de','$ab')";
		$this->db->query($sql);
		return true;
	}
	public function actualizar($where, $data) {
		
		$this->db->update("destinos", $data, $where);
		return true;
	}
	public function borar_por_id($id) {
		
		$this->db->where('id_destino', $id);
		$this->db->delete("destinos");
	}
	public function get_by_id($id) {
		$query = $this->db->query("SELECT a.id_destino,b.id_empresa,b.empresa,a.destino,a.abrev FROM destinos a LEFT JOIN empresas b ON b.id_empresa = a.id_empresa where a.id_destino =  $id")->row();
		return $query;
	}
	public function get_empresa() {
		
		$query = $this->db->select('id_empresa, empresa')->order_by('empresa')->get('empresas')->result_array();
		$empresas=array();
		foreach ($query as $r) {
			$empresas[$r["id_empresa"]] = $r['empresa'];	
		}
		return $empresas;
	}
	public function auditoria() {
		$usuario = $this->session->userdata('usuario');
		$this->db->query("SET application_name TO 'Sistema de Control de Visitas'");
		$this->db->query('SET session "scv.user" = "'.$usuario.'" ');
		$this->db->query('SET session "scv.ip" = "'.$_SERVER['REMOTE_ADDR'].'" ');		

	}	
}