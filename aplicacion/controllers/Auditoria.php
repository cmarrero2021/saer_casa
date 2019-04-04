<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auditoria extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('usuario')) {
			delete_cookie("ci_session");
			redirect(base_url().'login');
		}		
		$this->load->model("auditoria_model","auditoria");
	}
	public function index() {
		$this->session->set_userdata('titulo_url'," &nbsp;Listar auditorias");
		$this->session->set_userdata('icono_url',"icon-list-numbered");
		$this->load->view('plantillas/encabezado');
		$this->load->view('plantillas/menu_superior');
		$this->load->view('plantillas/menu_lateral');
		$this->load->view('plantillas/inicio_contenido'); 
		$this->load->view('auditoria/auditoria_view');
		$this->load->view('plantillas/pie');
	}
	public function get_auditoria(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$query = $this->auditoria->listar_auditoria();
		$data = [];
		foreach($query->result() as $r) {
			$data[] = array(
				$r->acciones='
				<a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ver ficha" onclick="ficha_auditoria('."'".$r->id_auditoria."'".')"><i class="icon-eye"></i></a>',
				$r->id_auditoria,
				$r->fecha_hora,
				$r->usuario,
				$r->ip,
				$r->equipo,
				$r->accion,
				$r->tabla,
				$r->sql,
				$r->estado_previo,
				$r->estado_actual
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
		$data = $this->auditoria->get_by_id($id);
		echo json_encode($data);
	}
}