<?php
class Aeropuertos_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		// $this->load->model('Audit_model', 'auditoria');
		// $this->auditoria->auditar();
	}
	public function listar_aeropuerto() {
		return $this->db->query("SELECT a.id_aeropuerto,b.tipo_aeropuerto,a.cod_iata,a.cod_oaci,a.aeropuerto,a.denominacion,c.estado,(case when administrado then 'SI' else 'NO' end) as administrado FROM aeropuertos a LEFT JOIN tipo_aeropuertos b on b.id_tipo_aeropuerto = a.id_tipo LEFT JOIN estados c on c.id_estado = a.id_estado ORDER BY a.id_aeropuerto");
	}
	public function guardar($data)	{
		foreach($data as $var => $val) {
			$$var = $val;
		}
		$sql = "INSERT INTO aeropuertos (id_tipo,cod_iata,cod_oaci,aeropuerto,denominacion,id_estado,administrado) values ($id_tipo,$cod_iata,$cod_oaci,$aeropuerto,$denominacion,$id_estado,$administrado)";
		$this->db->query($sql);
		return true;
	}
	public function actualizar($where, $data) {
		foreach($data as $var => $val) {
			$$var = $val;
		}
		$sql = "UPDATE aeropuertos SET id_tipo = $id_tipo,cod_iata = $cod_iata, cod_oaci = $cod_oaci, aeropuerto = $aeropuerto,denominacion = $denominacion, id_estado = $id_estado, administrado = $administrado WHERE id_aeropuerto = $id_aeropuerto";
		$this->db->query($sql);
		return true;
	}
	public function borar_por_id($id) {
		$arch = fopen("lucho","a");
		fwrite($arch,"id: $id".PHP_EOL);
		fclose($arch);
		$this->db->where('id_aeropuerto', $id);
		$this->db->delete("aeropuertos");
	}
	public function get_by_id($id) {
		$query = $this->db->query("SELECT a.id_aeropuerto,a.id_tipo,a.cod_iata,a.cod_oaci,a.aeropuerto,a.denominacion,a.id_estado,(case when administrado then 'SI' else 'NO' end) as administrado FROM aeropuertos a  WHERE a.id_aeropuerto = $id")->row();
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

	public function get_tipo() {
		$query = $this->db->select('id_tipo_aeropuerto, tipo_aeropuerto')->order_by('id_tipo_aeropuerto')->get('tipo_aeropuertos')->result_array();
		$tipo_aeropuertos=array();
		foreach ($query as $r) {
			$tipo_aeropuertos[$r["id_tipo_aeropuerto"]] = $r['tipo_aeropuerto'];	
		}
		return $tipo_aeropuertos;
	}

	public function auditoria() {
		// $usuario = $this->session->userdata('usuario');
		// $this->db->query("SET application_name TO 'Sistema de Control de Visitas'");
		// $this->db->query('SET session "scv.user" = "'.$usuario.'" ');
		// $this->db->query('SET session "scv.ip" = "'.$_SERVER['REMOTE_ADDR'].'" ');		

	}	
}