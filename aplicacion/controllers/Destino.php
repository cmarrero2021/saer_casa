<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Destino extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('usuario')) {
			delete_cookie("ci_session");
			redirect(base_url().'login');
		}		
		$this->load->model("destino_model","destino");
		$this->load->model("regvisitas_model","regvisitas");
		$this->output->enable_profiler(false);
	}
	public function index() {
		$this->session->set_userdata('titulo_url'," &nbsp;Listar destinos");
		$this->session->set_userdata('icono_url',"icon-list-numbered");
		$data['empresa']=$this->destino->get_empresa();
		$data['destino']=$this->destino->listar_destino();
		$this->load->view('plantillas/encabezado');
		$this->load->view('plantillas/menu_superior');
		$this->load->view('plantillas/menu_lateral');
		$this->load->view('plantillas/inicio_contenido'); 
		$this->load->view('auxiliares/destino_view',$data);
		$this->load->view('plantillas/pie');
	}
	public function get_destino(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$query = $this->destino->listar_destino();
		$data = [];
		foreach($query->result() as $r) {
			if ($this->session->userdata('rol_usuario') ==1 || $this->session->userdata('rol_usuario') ==2 ) {
				$data[] = array(
					$r->acciones='
					<a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ver ficha" onclick="ficha1('."'".$r->id_destino."'".')"><i class="icon-eye"></i></a>				
					<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Editar" onclick="editar1('."'".$r->id_destino."'".')"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Eliminar" onclick="eliminar1('."'".$r->id_destino."'".')"><i class="icon-bin"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;',
					$r->empresa,
					$r->id_destino,
					$r->destino,
					$r->abrev
				);
			} else {
				$data[] = array(
					$r->acciones='
					<a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ver ficha" onclick="ficha1('."'".$r->id_destino."'".')"><i class="icon-eye"></i></a>',
					$r->empresa,
					$r->id_destino,
					$r->destino,
					$r->abrev
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
	public function ajax_agregar(){
		if ($this->input->post('destino')=="") {
			$dest = $this->input->post('destino1');
			$empr = $this->input->post('empresa1');
		} else {
			$dest = $this->input->post('destino');
			$empr = $this->input->post('empresa');
		}
		$data = array(
			'id_empresa' => $empr,
			'destino' => $dest,
			'abrev' => $this->input->post('abrev')
		);
		$insert = $this->destino->guardar($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_eliminar($id){
		$this->destino->borar_por_id($id);
		echo json_encode(array("status" => TRUE));
	}	
	public function ajax_editar($id){
		$data = $this->destino->get_by_id($id);
		echo json_encode($data);
	}
	public function ajax_actualizar(){
		$data = array(
			'id_destino' => $this->input->post('id_destino'),
			'destino' => $this->input->post('destino'),
			'abrev' => $this->input->post('abrev')
		);
		$query=$this->destino->actualizar(array('id_destino' => $this->input->post('id_destino')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function llenar_listas() {
		$data['id_empresa']=$this->destino_model->get_empresa();
	}
}