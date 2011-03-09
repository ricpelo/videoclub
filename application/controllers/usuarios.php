<?php

class Usuarios extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Usuario');
  }
  
  function login() {
    $data['exito'] = $this->session->flashdata('exito');
    if (!$this->input->post('login')) {   
      $this->template->load('plantilla_login', 'usuarios_login.php', $data);
    } else {
      $nombre = $this->input->post('nombre');
      $password = $this->input->post('password');
      $consulta = $this->db->query("select * from usuarios
                                    where nombre_usuario = '$nombre' and
                                    password = md5('$password')");
      if ($consulta->num_rows() == 0) {
        $data['une'] = 'Usuario no encontrado';
        $this->template->load('plantilla_login', 'usuarios_login.php', $data);
      } else {
        $this->session->set_userdata('usuario', $nombre);
	redirect('principales/index');
      }
    }
  }
    
  function logout() {
    $this->session->unset_userdata('usuario');
    $this->session->sess_destroy();
    $this->template->load('plantilla_login', 'usuarios_logout');
  }

 function crear() {
 	$data['une'] = false;
  	$this->load->library('form_validation');
  	$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|callback_nombre_unico');
  	$this->form_validation->set_rules('password', 'Contraseña',
                                          'trim|required|matches[passconf]|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Confirmar contraseña', 'trim|required|min_length[5]');
    if (!$this->input->post('crear')) {
    $this->template->load('plantilla_login', 'usuarios_crear');
    } else {
      if ($this->form_validation->run() == TRUE) {
        $nombre = $this->input->post('nombre');
        $pass = $this->input->post('password');
        $this->Usuario->crear_usuario($nombre,$pass);
        $this->session->set_flashdata('exito', 'Usuario creado con éxito');
        redirect('usuarios/login');
      } else {
        $this->template->load('plantilla_login', 'usuarios_crear',$data);
     }
    }
  }

  function nombre_unico($nombre) {
    $consulta = $this->Usuario->obtener_usuario($nombre);
    if ($consulta) {
      $this->form_validation->set_message('nombre_unico', 'El nombre de usuario debe ser único');
      return FALSE;
    } else {
      return TRUE;
    }
  }
  
}
?>
