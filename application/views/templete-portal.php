<?php
	$this->load->view('cabecera', $data);
	$this->load->view($menu, $data);
	$this->load->view($contenido, $data);
	$this->load->view('pie');