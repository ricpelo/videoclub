<?php

class Principales extends CI_Controller {

  function __construct() {
    parent::__construct();
  }
   function index(){
	$this->load->helper(array('form','url'));
       
        $data['usuario'] = $this->session->userdata('usuario');
	$this->load->view('principal.php', $data);
   }
}
?>
