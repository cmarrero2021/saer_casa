<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aeropuertos extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('usuario')) {
			delete_cookie("ci_session");
			redirect(base_url().'login');
		}		
		$this->load->model("aeropuertos_model","aeropuerto");
		// $this->load->model("regvisitas_model","regvisitas");
		$this->output->enable_profiler(false);
	}
	public function index() {
		$this->session->set_userdata('titulo_url'," &nbsp;Listar aeropuertos");
		$this->session->set_userdata('icono_url',"icon-list-numbered");
		$data['estado']=$this->aeropuerto->get_estado();
		$data['tipo']=$this->aeropuerto->get_tipo();
		$data['aeropuerto']=$this->aeropuerto->listar_aeropuerto();
		$this->load->view('plantillas/encabezado');
		$this->load->view('plantillas/menu_superior');
		$this->load->view('plantillas/menu_lateral');
		$this->load->view('plantillas/inicio_contenido'); 
		$this->load->view('auxiliares/aeropuerto_view',$data);
		$this->load->view('plantillas/pie');
	}
	public function get_aeropuerto(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$query = $this->aeropuerto->listar_aeropuerto();
		$data = [];
		foreach($query->result() as $r) {
			// if ($this->session->userdata('rol_usuario') ==1 || $this->session->userdata('rol_usuario') ==2 ) {
			$data[] = array(
				$r->acciones='
				<a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ver ficha" onclick="ficha1('."'".$r->id_aeropuerto."'".')"><i class="icon-eye"></i></a>				
				<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Editar" onclick="editar1('."'".$r->id_aeropuerto."'".')"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Eliminar" onclick="eliminar1('."'".$r->id_aeropuerto."'".')"><i class="icon-bin"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;',
				$r->id_aeropuerto,
				$r->tipo_aeropuerto,
				$r->cod_iata,
				$r->cod_oaci,
				$r->aeropuerto,
				$r->denominacion,
				$r->estado,
				$r->administrado
			);
			// } else {
			// 	$data[] = array(
			// 		$r->acciones='
			// 		<a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ver ficha" onclick="ficha1('."'".$r->id_aeropuerto."'".')"><i class="icon-eye"></i></a>',
			// 		$r->id_aeropuerto,
			// 		$r->tipo_aeropuerto,
			// 		$r->cod_iata,
			// 		$r->cod_oaci,
			// 		$r->cod_oaci,
			// 		$r->aeropuerto,
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
		// if ($this->input->post('aeropuerto')=="") {
		// 	$dest = $this->input->post('aeropuerto1');
		// 	$empr = $this->input->post('empresa1');
		// } else {
		// 	$dest = $this->input->post('aeropuerto');
		// 	$empr = $this->input->post('empresa');
		// }
		// $data = array(
		// 	'id_empresa' => $empr,
		// 	'aeropuerto' => $dest,
		// 	'abrev' => $this->input->post('abrev')
		// );
		// $insert = $this->aeropuerto->guardar($data);
		// echo json_encode(array("status" => TRUE));
		$data = array(
			'id_aeropuerto' => $this->input->post('id_aeropuerto'),
			'id_tipo' => $this->input->post('tipo'),
			'cod_iata' => "'".$this->input->post('iata')."'",
			'cod_oaci' => "'".$this->input->post('oaci')."'",
			'aeropuerto' => "'".$this->input->post('aeropuerto')."'",
			'denominacion' => "'".$this->input->post('denominacion')."'",
			'id_estado' => $this->input->post('estado'),
			'administrado' => $this->input->post('administrado')
		);
		$insert = $this->aeropuerto->guardar($data);
		echo json_encode(array("status" => TRUE));


	}
	public function ajax_eliminar($id){
		$this->aeropuerto->borar_por_id($id);
		echo json_encode(array("status" => TRUE));
	}	
	public function ajax_editar($id){
		$data = $this->aeropuerto->get_by_id($id);
		echo json_encode($data);
	}
	public function ajax_actualizar(){
		$data = array(
			'id_aeropuerto' => $this->input->post('id_aeropuerto'),
			'id_tipo' => $this->input->post('tipo'),
			'cod_iata' => "'".$this->input->post('iata')."'",
			'cod_oaci' => "'".$this->input->post('oaci')."'",
			'aeropuerto' => "'".$this->input->post('aeropuerto')."'",
			'denominacion' => "'".$this->input->post('denominacion')."'",
			'id_estado' => $this->input->post('estado'),
			'administrado' => $this->input->post('administrado')
		);
		$query=$this->aeropuerto->actualizar(array('id_aeropuerto' => $this->input->post('id_aeropuerto')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function llenar_listas() {
		$data['id_empresa']=$this->aeropuerto_model->get_empresa();
	}
}