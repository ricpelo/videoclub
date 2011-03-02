<?php

class Usuarios extends CI_Controller {

  function __construct() {
    parent::__construct();
  }
  
  function login() {
    $this->load->helper(array('form', 'url'));
    $data['une'] = false;
    if (!$this->input->post('login')) {   
      $this->load->view('usuarios_login.php', $data);
    } else {
      $nombre = $this->input->post('nombre');
      $password = $this->input->post('password');
      $consulta = $this->db->query("select * from usuarios
                                    where nombre_usuario = '$nombre' and
                                    password = md5('$password')");
      if ($consulta->num_rows() == 0) {
        $data['une'] = 'Usuario no encontrado';
        $this->load->view('usuarios_login.php', $data);
      } else {
        $this->session->set_userdata('usuario', $nombre);
	$this->load->view("principal.php");
      }
    }
  }
    
  function logout() {
    $this->load->helper('url');
    $this->session->unset_userdata('usuario');
    $this->session->sess_destroy();
    $this->load->view('usuarios_logout');
  }

  function borrar($numero) {
   //pregunta si esta declarada la variable borrar
    if (!$this->input->post('borrar')) {
	$data['numero'] = $numero;
      $this->load->view('socios_borrar', $data);
    } else {
        $numero = $this->input->post('numero');
        $this->Socio->borrar_socio($numero);
        $this->session->set_flashdata('exito', 'Socio borrado con éxito');
        redirect('socios/index');
      }
  }
}
?>
