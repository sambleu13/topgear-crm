<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {	
		public function __construct(){
			parent::__construct();
			if(@!$_SESSION['correo']){
				redirect(base_url());
			}
		}
		
		public function index()
		{
			$this->load->model('usuarios');
			$data['data'] = $this->usuarios->getData();
			if($data['data']['tipo'] == 'admin'){
				//admin
				$data['data']['vendedores'] = $this->usuarios->getSalersData();
				$data['menu'] = 'menu';
				$data['contenido'] = 'inicio-portal';
			}elseif($data['data']['tipo'] =='vendedor'){
				//vendedor
				$data['menu'] = 'menu-vendedor';
				$data['contenido'] = 'inicio-portal-vendedor';
				//$data['data']['cliente'] = $this->usuarios->getClientsData();
			}else{
				//cliente
				$data['menu'] = 'menu-cliente';
				$data['contenido'] = 'inicio-portal-cliente';
				$data['data']['solicitud']=$this->usuarios->getAppData(); 
			}
			$data['data']['titulo'] = 'TOPGEAR';
			$this->load->view('templete-portal',$data);
		}

		public function nuevo_vendedor(){
			$this->load->model('usuarios');
			$data['data'] = $this->usuarios->getData();
			$data['data']['titulo'] = 'Nuevo vendedor';
			$data['menu'] = 'menu';
			$data['contenido'] = 'registro-vendedor';
			$data['data']['url'] = base_url() . 'portal';
			$this->load->view('templete-portal',$data);
		}

		public function nuevo_cliente(){
			$this->load->model('usuarios');
			$data['data'] = $this->usuarios->getData();
			$data['data']['titulo'] = 'Nuevo cliente';
			$data['menu'] = 'menu-vendedor';
			$data['contenido'] = 'registro-cliente';
			$data['data']['url'] = base_url() . 'portal';
			$this->load->view('templete-portal',$data);
		}

		public function editar(){
			$this->load->model('usuarios');
			$data['data'] = $this->usuarios->getData();
			if($data['data']['tipo'] == 'admin'){
				//admin
				$data['menu'] = 'menu';
			}else{
				//vendedor
				$data['menu'] = 'menu-vendedor';
			}
			$data['contenido'] = 'editar';
			$data['data']['titulo'] = 'Editar';
			$this->load->view('templete-portal',$data);
			}

		public function editar_cliente(){
			$this->load->model('usuarios');
			$data['data'] = $this->usuarios->getUserData();
			//cliente
			$data['menu'] = 'menu-cliente';
			$data['contenido'] = 'editar-cliente';
			$data['data']['titulo'] = 'Editar';
			$this->load->view('templete-portal',$data);
			}

		public function solicitud(){
			$this->load->model('usuarios');
			$data['data'] = $this->usuarios->getUserData();
			//cliente
			$data['menu'] = 'menu-cliente';
			$data['contenido'] = 'editar-cliente';
			$data['data']['titulo'] = 'Editar';
			$this->load->view('templete-portal',$data);
			}

		public function catalogo() {
			//$this->load->model('productos');
			$this->load->model('usuarios');
			$data['data'] = $this->usuarios->getData();
			$data['productos'] = $this->productos->getProductos();
			$data['contenido'] = 'catalogo';
			$data['data']['titulo'] = 'Catálogo de productos';
			$this->load->view('templete-portal', $data);
		}
}

