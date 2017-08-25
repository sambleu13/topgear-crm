<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {
		//conectar a la base de datos	
	public function crearVendedor($datos){
		
		$condiciones = array(
			'correo'=>$datos['correo']
		);	
		$resultSet = $this->db->where($condiciones)->get('usuario');	
		if($resultSet->num_rows()==0){
			$datos['contrasena'] = md5($datos['contrasena']);
			$datos['tipo'] = 'vendedor';
			$this->db->insert('usuario', $datos);
			return true;
		}else{
			return false;
		}	
	}

	public function crearCliente($datos){
		if($datos['historial'] == NULL){
			$datos['historial'] = '';
		}
		$condiciones = array(
			'correo'=>$datos['correo']
		);
		$resultSet = $this->db->where($condiciones)->get('usuario');	
		if($resultSet->num_rows()==0){
			$cuenta = array(
				'correo' => $datos['correo'],
				'nombre' => $datos['nombre'],
				'contrasena' => md5($datos['contrasena']),
				'tipo' => 'cliente'
				);
			$personal = array(
				'rfc' => $datos['rfc'],
				'idusuario' => $datos['correo'],
				'edad' => $datos['edad'],
				'historial' => $datos['historial']
				);
			$relacion = array(
				'vendedor' => $_SESSION['correo'],
				'cliente' => $datos['rfc']
				);
			$solicitud = array(
				'idcliente' => $datos['rfc'],
				'probabilidad' => $datos['probabilidad'],
				'estado' => $datos['estado'],
				'marca' => $datos['marca'],
				'modelo' => $datos['modelo'],
				'ano' => $datos['ano'],
				'costo' => $datos['costo']
				);
			$this->db->insert('usuario', $cuenta);
			$this->db->insert('cliente', $personal);
			$this->db->insert('vendedor', $relacion);
			$this->db->insert('solicitud', $solicitud);
			return true;
		}else{
			return false;
		}	
		$condiciones = array(
			'rfc'=>$datos['rfc']
		);	
		$relacion = array(
	        'vendedor' => $vendedor,
	        'name' => $datos['rfc'],
		);
		$resultSet = $this->db->where($condiciones)->get('usuario');	
		if($resultSet->num_rows()==0){
			$datos['historial'] = null;
			$this->db->insert('cliente', $datos);
			$this->db->insert('vendedor', $relacion);
			return true;
		}else{
			return false;
		}		
	}
	
	public function login($datos){
		$condiciones = array(
		 	'correo'=>$datos['correo']
	);
	$resultSet = $this->db->where($condiciones)->get('usuario');
	if($resultSet->num_rows()>0){
		$registro = $resultSet->row();
		$_SESSION['correo'] = $registro->correo;
		$_SESSION['nombre'] = $registro->nombre;
		$_SESSION['tipo'] = $registro->tipo;
		return true;
	}else{
		return false;
	}
	}

	public function logout(){
		session_destroy();
	}
	
	public function getData(){
	
		return array(
		'correo' => $_SESSION['correo'],
		'nombre' => $_SESSION['nombre'],
		'tipo' 	 => $_SESSION['tipo'],
	);
	}
//NO FUNCIONA PARA EDITAR CLIENTE, NO MANDA VALORES DE RFC NI EDAD :(
	public function getUserData(){
	$condiciones = array(
		'idusuario' => $_SESSION['correo']
		);
	$rfc=$this->db->where($condiciones)->select('rfc')->get('cliente')->row()->rfc;
	$edad=$this->db->where($condiciones)->select('edad')->get('cliente')->row()->edad;
	return array(
		'correo' => $_SESSION['correo'],
		'nombre' => $_SESSION['nombre'],
		'tipo' 	 => $_SESSION['tipo'],
		'rfc'    => $rfc,
		'edad'   => $edad
		);
	}

	public function select($tipo)  
      {  
         //data is retrive from this query  
         $query = $this->db->get($tipo);  
         return $query;  
      }

    public function update($datos)
    {
    	if($datos['contrasena'] != ''){
    		$resultSet = array(
    			'nombre' => $datos['nombre'],
    			'contrasena' => md5($datos['contrasena'])
    		);
    	}else{
			$resultSet = array(
    			'nombre' => $datos['nombre'],
    		);
    	}
		$id = $datos['correo'];
        $this->db->where('correo', $id);
        $this->db->update('usuario', $resultSet);
		$_SESSION['nombre'] = $datos['nombre'];
    }

    public function update_client($datos)
    {
    	if($datos['contrasena'] != ''){
    		$cuenta = array(
    			'nombre' => $datos['nombre'],
    			'contrasena' => md5($datos['contrasena'])
    		);
    	}else{
			$cuenta = array(
    			'nombre' => $datos['nombre'],
    		);
    	}
    	if(@$_FILES[$datos['historial']] == NULL){
			$personal = array(
			'edad' => $datos['edad'],
			'historial' => ''
			);
		}else{
			$personal = array(
			'edad' => $datos['edad'],
			'historial' => $datos['historial']
			);
		}
		$id = $datos['correo'];
        $this->db->where('correo', $id);
        $this->db->update('usuario', $cuenta);

        $this->db->where('idusuario', $id);
        $this->db->update('cliente', $personal);
		$_SESSION['nombre'] = $datos['nombre'];
    }

    public function getAppData()
    {
    	$c1 = array(
			'idusuario' => $_SESSION['correo']
			);
    	$rfc=$this->db->where($c1)->select('rfc')->get('cliente')->row()->rfc;
    	$c2 = array(
			'idcliente' => $rfc
			);
    	$probabilidad=$this->db->where($c2)->select('probabilidad')->get('solicitud')->row()->probabilidad;
    	$estado=$this->db->where($c2)->select('estado')->get('solicitud')->row()->estado;
    	$marca=$this->db->where($c2)->select('marca')->get('solicitud')->row()->marca;
    	$modelo=$this->db->where($c2)->select('modelo')->get('solicitud')->row()->modelo;
    	$ano=$this->db->where($c2)->select('ano')->get('solicitud')->row()->ano;
    	$costo=$this->db->where($c2)->select('costo')->get('solicitud')->row()->costo;

    	return array(
		'probabilidad' => $probabilidad,
		'estado'       => $estado,
		'marca' 	   => $marca,
		'modelo'       => $modelo,
		'ano'          => $ano,
		'costo'        => $costo
		);
    }

    public function getSalersData()
    {
    	$tipo = array(
			'tipo' => 'vendedor'
			);
    	return $vendedores = $this->db->where($tipo)->get('usuario');
    }

    public function getClientsData()
    {
    	$query = ("SELECT vendedor.cliente, cliente.idusuario, 
    				usuario.nombre, solicitud.estado FROM vendedor
    				INNER JOIN cliente on vendedor.cliente = cliente.rfc
    				INNER JOIN solicitud on cliente.rfc = solicitud.idcliente
    				INNER JOIN usuario on cliente.idusuario = usuario.correo
    				WHERE vendedor.vendedor = ".$_SESSION['correo']."");

    	return $query;
    }

}