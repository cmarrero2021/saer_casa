<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Estados extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('usuario')) {
			delete_cookie("ci_session");
			redirect(base_url().'login');
		}		
		$this->load->model("estados_model","estado");
		// $this->load->model("regvisitas_model","regvisitas");
		$this->output->enable_profiler(false);
	}
	public function index() {
		$this->session->set_userdata('titulo_url'," &nbsp;Listar estados");
		$this->session->set_userdata('icono_url',"icon-list-numbered");
		$data['estado']=$this->estado->get_estado();
		$data['estado']=$this->estado->listar_estado();
		$this->load->view('plantillas/encabezado');
		$this->load->view('plantillas/menu_superior');
		$this->load->view('plantillas/menu_lateral');
		$this->load->view('plantillas/inicio_contenido'); 
		$this->load->view('auxiliares/estado_view',$data);
		$this->load->view('plantillas/pie');
	}
	public function get_estado(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$query = $this->estado->listar_estado();
		$data = [];
		foreach($query->result() as $r) {
			$data[] = array(
				$r->acciones='
				<a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ver ficha" onclick="ficha1('."'".$r->id_estado."'".')"><i class="icon-eye"></i></a>',
				$r->id_estado,
				$r->estado
			);				
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);
		echo json_encode($result);
	}
	public function ajax_editar($id){
		$data = $this->estado->get_by_id($id);
		echo json_encode($data);
	}
}