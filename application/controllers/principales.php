<?php

class Principales extends CI_Controller {

  function __construct() {
    parent::__construct();
      if (!$this->session->userdata('usuario')) {
      redirect('usuarios/login');
    }
  }
   function index(){
	$this->load->helper(array('form','url'));
       
        $data['usuario'] = $this->session->userdata('usuario');
	$this->template->load('template', 'principal', $data);
   }
}
?>
