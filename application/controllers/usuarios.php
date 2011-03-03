<?php

class Usuarios extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('usuario');
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
 	$data['une'] = false;
  	$this->load->library('form_validation');
  	$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
  	$this->form_validation->set_rules('password', 'Contraseña', 'trim|required');
  	$comprobarNombre = $this->input->post('nombre');
  	$comprobarNombre = $this->nombre_unico($comprobarNombre);
    if (!$this->input->post('crear')) {
      $this->load->view('usuarios_crear');
    } else {
      if ($this->form_validation->run() == TRUE && $comprobarNombre == 0) {
        $nombre = $this->input->post('nombre');
        $pass = $this->input->post('password');
        $this->usuario->crear_usuario($nombre,$pass);
        $this->session->set_flashdata('exito', 'Usuario creado con éxito');
        redirect('usuarios/login');
      } else {
      if ($comprobarNombre == 1){
      	$data['une'] = 'Ya existe un usuario con ese nombre';
      	}
        $this->load->view('usuarios_crear',$data);
     }
    }
  }
    function nombre_unico($nombre) {
    $consulta = $this->usuario->obtener_usuario($nombre);
    if (!$consulta) {
      return FALSE;
    } else {
      return TRUE;
    }
  }
  
}
?>
