<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('usuario_model');		
	}
	public function index() {
		$this->entrar();
	}
	public function entrar()
	{
		if($this->session->userdata('usuario')) {
			redirect(base_url().'inicio');
		}
		if (isset($_POST['usuario'])) {
			if ($this->usuario_model->login($_POST['usuario'],$_POST['clave'])) {
				$this->session->set_userdata('usuario',$_POST['usuario']);
				redirect(base_url().'inicio',$data);
			} else {
				redirect(base_url().'login');
			}
		}
		$this->load->view('plantillas/encabezado');
		$this->load->view('login');
		$this->load->view('plantillas/pie');
	}
	public function salir() {
		$this->usuario_model->salir();
		$this->session->sess_destroy();
		delete_cookie("ci_session");
		$this->entrar(); 
	}
}
