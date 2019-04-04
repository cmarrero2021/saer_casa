<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('usuario')) {
			delete_cookie("ci_session");
			redirect(base_url().'login');
		}		
		$this->load->model("usuarios_model","usuarios");
		$this->load->model("regvisitas_model","regvisitas");
		$this->load->model("cne_model","cne");
		$this->output->enable_profiler(false);
	}
	public function index() {
		$this->session->set_userdata('titulo_url'," &nbsp;Listar usuarios");
		$this->session->set_userdata('icono_url',"icon-list-numbered");
		// $data['empresa']=$this->usuarios->get_empresa();
		$data['usuarios']=$this->usuarios->listar_usuarios();
		$this->load->view('plantillas/encabezado');
		$this->load->view('plantillas/menu_superior');
		$this->load->view('plantillas/menu_lateral');
		$this->load->view('plantillas/inicio_contenido'); 
		$this->load->view('seguridad/usuarios_view',$data);
		$this->load->view('plantillas/pie');
	}
	public function get_usuarios(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$query = $this->usuarios->listar_usuarios();
		$data = [];
		foreach($query->result() as $r) {
			if ($this->session->userdata('rol_usuario') ==1 || $this->session->userdata('rol_usuario') ==2 ) {
				$data[] = array(
					$r->acciones='
					<a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ver ficha" onclick="ficha('."'".$r->id_usuario."'".')"><i class="icon-eye"></i></a>				
					<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Editar" onclick="editar('."'".$r->id_usuario."'".')"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Eliminar" onclick="eliminar('."'".$r->id_usuario."'".')"><i class="icon-bin"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;',
					$r->id_usuario,
					$r->ci_usuario,
					$r->nombre_usuario,
					$r->login_usuario,
					$r->id_grupo,
					$r->activo,
					$r->fecha_creacion
				);
			} else {
				$data[] = array(
					$r->acciones='
					<a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ver ficha" onclick="ficha('."'".$r->id_usuario."'".')"><i class="icon-eye"></i></a>',
					$r->id_usuario,
					$r->ci_usuario,
					$r->nombre_usuario,
					$r->login_usuario,
					$r->id_grupo,
					$r->activo,
					$r->fecha_creacion
				);				
			}
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);
		echo json_encode($result);
	}
	public function buscar_cne() {
		$ced = $this->uri->segment(3);
		$usuario = $this->cne->busqueda_cne($ced);
		echo json_encode($usuario,JSON_UNESCAPED_UNICODE);
	}
	public function ajax_agregar(){
		$ced = $this->input->post('cedula');
		$nom = $this->input->post('nombre');
		$log = $this->input->post('login');
		$cla = $this->input->post('clave');
		$data = array(
			'ci_usuario' => $ced,
			'nombre_usuario' => $nom,
			'login_usuario' => $log,
			'clave_usuario' => $cla,
			'id_grupo' => 1,
			'activo' => 't'
		);
		$insert = $this->usuarios->guardar($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_eliminar($id){
		$this->usuarios->borar_por_id($id);
		echo json_encode(array("status" => TRUE));
	}	
	public function ajax_editar($id){
		$data = $this->usuarios->get_by_id($id);
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	public function ajax_actualizar(){
		$data = array(
			'id_destino' => $this->input->post('id_destino'),
			'destino' => $this->input->post('destino'),
			'abrev' => $this->input->post('abrev')
		);
		$query=$this->usuarios->actualizar(array('id_destino' => $this->input->post('id_destino')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function llenar_listas() {
		$data['id_empresa']=$this->usuarios->get_empresa();
	}
}