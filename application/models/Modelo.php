<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo extends CI_Model {
	
	public function datos(){
		return array('nombre'=>'Samantha', 'apellido'=>'Pantoja');
		
	}
	
}