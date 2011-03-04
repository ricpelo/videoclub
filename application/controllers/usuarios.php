<?php

class Usuarios extends CI_Controller {

  function __construct() {
    parent::__construct();
  }
  
  function login() {
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
	redirect('principales/index');
      }
    }
  }
 
    
  function logout() {
    $this->session->unset_userdata('usuario');
    $this->session->sess_destroy();
    $this->load->view('usuarios_logout');
  }
  function crear() {
  	$this->load->library('form_validation');
  	$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
  	$this->form_validation->set_rules('contraseña', 'Contraseña', 'trim|required');
    if (!$this->input->post('crear')) {
      $this->load->view('usuarios_crear');
    } else {
      if ($this->form_validation->run() == TRUE) {
        $nombre = $this->input->post('nombre');
        $pass = $this->input->post('password');
        $this->usuario->crear_usuario($nombre,$pass);
        $this->session->set_flashdata('exito', 'Usuario creado con éxito');
        redirect('principales/index');
      } else {
        $this->load->view('usuarios_crear');
     }
    }
  }
  
}
?>
