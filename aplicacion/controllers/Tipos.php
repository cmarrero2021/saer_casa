<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tipos extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('usuario')) {
			delete_cookie("ci_session");
			redirect(base_url().'login');
		}		
		$this->load->model("tipos_model","tipo");
		// $this->load->model("regvisitas_model","regvisitas");
		$this->output->enable_profiler(false);
	}
	public function index() {
		$this->session->set_userdata('titulo_url'," &nbsp;Listar tipos");
		$this->session->set_userdata('icono_url',"icon-list-numbered");
		$data['tipo']=$this->tipo->listar_tipo();
		$this->load->view('plantillas/encabezado');
		$this->load->view('plantillas/menu_superior');
		$this->load->view('plantillas/menu_lateral');
		$this->load->view('plantillas/inicio_contenido'); 
		$this->load->view('auxiliares/tipo_view',$data);
		$this->load->view('plantillas/pie');
	}
	public function get_tipo(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$query = $this->tipo->listar_tipo();
		$data = [];
		foreach($query->result() as $r) {
			// if ($this->session->userdata('rol_usuario') ==1 || $this->session->userdata('rol_usuario') ==2 ) {
			$data[] = array(
				$r->acciones='
				<a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ver ficha" onclick="ficha1('."'".$r->id_tipo_aeropuerto."'".')"><i class="icon-eye"></i></a>				
				<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Editar" onclick="editar1('."'".$r->id_tipo_aeropuerto."'".')"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Eliminar" onclick="eliminar1('."'".$r->id_tipo_aeropuerto."'".')"><i class="icon-bin"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;',
				$r->id_tipo_aeropuerto,
				$r->tipo_aeropuerto
			);
			// } else {
			// 	$data[] = array(
			// 		$r->acciones='
			// 		<a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ver ficha" onclick="ficha1('."'".$r->id_tipo."'".')"><i class="icon-eye"></i></a>',
			// 		$r->id_tipo,
			// 		$r->tipo_tipo,
			// 		$r->cod_iata,
			// 		$r->cod_oaci,
			// 		$r->cod_oaci,
			// 		$r->tipo,
			// 		$r->denominacion,
			// 		$r->estado,
			// 		$r->administrado
			// 	);				
			// }
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);
		echo json_encode($result);
	}
	public function ajax_agregar(){
		$data = array(
			'id_tipo_aeropuerto' => $this->input->post('id_tipo'),
			'tipo_aeropuerto' => "'".$this->input->post('tipo')."'"
		);
		$insert = $this->tipo->guardar($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_eliminar($id){
		$this->tipo->borar_por_id($id);
		echo json_encode(array("status" => TRUE));
	}	
	public function ajax_editar($id){

		$data = $this->tipo->get_by_id($id);
		echo json_encode($data);
	}
	public function ajax_actualizar(){
		$data = array(
			'id_tipo_aeropuerto' => $this->input->post('id_tipo'),
			'tipo_aeropuerto' => "'".$this->input->post('tipo')."'"
		);
		$query=$this->tipo->actualizar(array('id_tipo_aeropuerto' => $this->input->post('id_tipo')), $data);
		echo json_encode(array("status" => TRUE));
	}
}