<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('usuario')) {
			delete_cookie("ci_session");
			redirect(base_url().'login');
		}
	}

	public function index()
	{
		$this->load->model('usuario_model');
		$data['nombre_usuario'] = $this->usuario_model->obtener_usuario();
		$this->session->set_userdata('nombre_usuario',$data['nombre_usuario']);
		$this->session->set_userdata('direccion_url',base_url()."regvisitas");
		$this->session->set_userdata('titulo_url',"Registrar Visitas");
		$this->session->set_userdata('icono_url',"icon_group");
		$this->load->model('usuario_model');
		$this->load->view('plantillas/encabezado',$data);
		$this->load->view('plantillas/menu_superior');
		$this->load->view('plantillas/menu_lateral');
		$this->load->view('plantillas/inicio_contenido');
		$this->load->view('visitas/busqueda_view');
		$this->load->view('cuerpo_inicio');
		$this->load->view('plantillas/pie');
	}
}
