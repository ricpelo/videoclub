<?php

/* Ejemplo */

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
                                    where nombre = '$nombre' and
                                    password = md5('$password')");
      if ($consulta->num_rows() == 0) {
        $data['une'] = 'Usuario no encontrado';
        $this->load->view('usuarios_login.php', $data);
      } else {
        $this->session->set_userdata('usuario', $nombre);
        redirect('socios/index');
      }
    }
  }
    
  function logout() {
    $this->load->helper('url');
    $this->session->unset_userdata('usuario');
    $this->session->sess_destroy();
    $this->load->view('usuarios_logout');
  }
}
?>
