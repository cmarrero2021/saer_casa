<?php
class Usuarios_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Audit_model', 'auditoria');
		$this->auditoria->auditar();
	}
	public function listar_usuarios() {
		return $this->db->query("SELECT a.id_usuario,a.ci_usuario,a.nombre_usuario,a.login_usuario,case when a.id_grupo = 1 then 'ADMINISTRADOR' when a.id_grupo = 2 then 'SUPERVISOR' when a.id_grupo = 3 then 'USUARIO' end as id_grupo ,case when a.activo then 'SI' else 'NO' end as activo,a.fecha_creacion FROM usuarios a ORDER BY a.id_usuario");
	}
	public function guardar($data)	{
		$ced = $data['ci_usuario'];
		$nom = "'".$data['nombre_usuario']."'";
		$log = "'".$data['login_usuario']."'";
		$cla = "'".$data['clave_usuario']."'";
		$gru = $data['id_grupo'];
		$act = "'".$data['activo']."'";
		$sql = "INSERT INTO usuarios (ci_usuario,nombre_usuario,login_usuario,clave_usuario,id_grupo,activo) VALUES ($ced,$nom,$log,$cla,$gru,$act)";
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
		$query = $this->db->query("SELECT a.id_usuario,a.ci_usuario,a.nombre_usuario,a.login_usuario,case when a.id_grupo = 1 then 'ADMINISTRADOR' when a.id_grupo = 2 then 'SUPERVISOR' when a.id_grupo = 3 then 'USUARIO' end as id_grupo ,case when a.activo then 'ACTIVO' else 'INACTIVO' end as activo,a.fecha_creacion FROM usuarios a where a.id_usuario =  $id")->row();
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