<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Audit_model', 'auditoria');
		// $this->auditoria->auditar();
	}
	public function login($usuario,$clave) {
		$clv = $clave;
		$clave = md5($clave);
		$this->db->where('login_usuario',$usuario);
		$this->db->where('clave_usuario',$clave);
		$ip = $_SERVER['REMOTE_ADDR'];
		$resultados = $this->db->get('usuarios');
		if($resultados->num_rows()>0) {
			// $datos = $resultados->row_array();
			// $sql = "INSERT INTO login (ip,ci_usuario,login_usuario,nombre_usuario,accion,exito) VALUES ('".$ip."',".$datos['ci_usuario'].",'".$usuario."','".$datos['nombre_usuario']."','I','t')";
			// $this->db->query($sql);
			$this->session->set_userdata('usuario',$usuario);
			$this->session->set_userdata('cedula',$datos['ci_usuario']);
			$this->session->set_userdata('nombre',$datos['nombre_usuario']);
			$this->session->set_userdata('id_usuario',$datos['id_usuario']);
			$this->session->set_userdata('rol_usuario',$datos['id_grupo']);
			return true;
		} else {
			$this->db->where('login_usuario',$usuario);
			$res = $this->db->get('usuarios');
			if ($res->num_rows()>0) {
				// $sql = "INSERT INTO login (ip,login_usuario,clave_usuario,accion,exito) VALUES ('".$ip."','".$usuario."','".$clv."','I','f')";
			} else {
				// $sql = "INSERT INTO login (ip,login_usuario,accion,exito) VALUES ('".$ip."','".$usuario."','I','f')";
			}
			$this->db->query($sql);			
			return false;
		}
	}
	public function obtener_usuario() {
		$usuario = $this->session->userdata('usuario');
		$consulta = $this->db->query("SELECT ci_usuario,nombre_usuario FROM usuarios WHERE login_usuario = '$usuario'");
		$fila = $consulta->row_array();
		return $fila["nombre_usuario"];
	}
	public function salir() {
		// $usuario = $this->session->userdata('usuario');
		// $ci_usuario = $this->session->userdata('cedula');
		// $nombre_usuario = $this->session->userdata('nombre_usuario');		
		// $ip = $_SERVER['REMOTE_ADDR'];
		// $sql = "INSERT INTO login (ip,ci_usuario,login_usuario,nombre_usuario,accion,exito) VALUES ('".$ip."',".$ci_usuario.",'".$usuario."','".$nombre_usuario."','S','t')";
		// $this->db->query($sql);
		return true;
	}
	// public function auditoria() {
	// 	$usuario = $this->session->userdata('usuario');
	// 	$this->db->query("SET application_name TO 'Sistema de Control de Visitas'");
	// 	$this->db->query('SET session "scv.user" = "'.$usuario.'" ');
	// 	$this->db->query('SET session "scv.ip" = "'.$_SERVER['REMOTE_ADDR'].'" ');		

	// }
}

/* End of file usuario_model.php */
/* Location: .//C/xampp/htdocs/tema/aplicacion/models/usuario_model.php */