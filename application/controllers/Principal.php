<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('modelo');
	}
	
	public function index()
	{
		$datos = $this->modelo->datos();
		$datos['contenido'] = 'inicio-sesion';
		$datos['data']['titulo'] = 'Inicio de sesión';
		$this->load->view('templete',$datos);		
	}
	
	public function registro(){
		//$this->load->model('archivos');
		$this->load->model('usuarios');
		$creador = $this->usuarios->getData();
		if($creador['tipo'] == 'admin'){
			$resultado = $this->usuarios->crearVendedor($_POST); //mandamos los datos
		}elseif($creador['tipo'] =='vendedor'){
			$resultado = $this->usuarios->crearCliente($_POST); //mandamos los datos
		}else{
			$mensaje = 'Cliente no puede registrar';
		}
		if($resultado){
			$mensaje = 'El registro fue creado con exito';
		}else{
			$mensaje = 'Ocurrio un error al crear el registro';
		}
		$data['mensaje'] = $mensaje;
		$data['url'] = base_url() . 'portal';
		$this->load->view('mensaje',$data);
	}
	
	public function login(){
		$this->load->model('usuarios');
		$resultado = $this->usuarios->login($_POST);
		if($resultado){
			redirect(base_url().'portal');
			$data['mensaje'] = $mensaje;
			$data['url'] = base_url().'principal';
			$this->load->view('mensaje',$data);
		}
	}
	public function logout(){
		$this->load->model('usuarios');
		$this->usuarios->logout();
			redirect(base_url());
		}

	public function edit(){
		$this->load->model('usuarios');
		$data['data'] = $this->usuarios->getData();
		$this->usuarios->update($_POST);
		redirect(base_url().'portal/editar');
		if($data['data']['tipo'] == 'admin'){
			//admin
			$data['menu'] = 'menu';
		}elseif($data['data']['tipo'] =='vendedor'){
			//vendedor
			$data['menu'] = 'menu-vendedor';
		}
		$data['contenido'] = 'editar';
		$data['data']['titulo'] = 'Editar';
		$this->load->view('templete-portal',$data);
		}

	public function edit_client(){
		//$this->load->model('archivos');
		$this->load->model('usuarios');
		$data['data'] = $this->usuarios->getUserData();
		$this->usuarios->update_client($_POST);
		redirect(base_url().'portal/editar_cliente');
		$data['menu'] = 'menu-cliente';
		$data['contenido'] = 'editar-cliente';
		$data['data']['titulo'] = 'Editar';
		$this->load->view('templete-portal',$data);
		}

	}