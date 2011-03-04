<?php
define("FPP", 100);

class Alquileres extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('Alquiler');
    if (!$this->session->userdata('usuario')) {
      redirect('usuarios/login');
    }
  }
  
  function index() {
    $data['exito'] = "";
    $data['usuario'] = $this->session->userdata('usuario');
    $this->template->load('template', 'alquileres_index', $data);
  }
  
  function seleccionar_socio() {
    $data['usuario'] = $this->session->userdata('usuario');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('numero', 'Número',
                                      'trim|required|is_natural_no_zero');
    if (!$this->input->post('buscar') && !$this->session->userdata('socio')) {
      $data['exito'] = "Pasa por aqui";
     $this->template->load('template', 'alquileres_index', $data);
    } else {
      if ($this->form_validation->run() == TRUE || $this->session->userdata('socio')) {
        if ($this->input->post('numero')) {
          $num = $this->input->post('numero');
          $this->session->set_userdata('socio', $num);
        } else {
          $num = $this->session->userdata('socio');
        }  
        $data['numero'] = $num;
        $data['socio'] = $num;      
        $this->load->model('Socio');
        $consulta = $this->Socio->obtener_socio($num);
        if ($consulta != false) {
          $data = array_merge($data, $consulta);
          $data['filas'] = $this->Alquiler->obtener_alquileres($num);
          $this->template->load('template', 'alquileres_socio', $data);
        } else {
          redirect('alquileres', $data);
        }
      } else {
        $data['exito'] = "No se valida el formulario";
        redirect('alquileres', $data);
      }
    }  	 
  }
  
  function devolver() {
    $data['usuario'] = $this->session->userdata('usuario');
    $data['socio'] = $this->session->userdata('socio');
    $num = $data['socio'];
    if ($this->input->post('id_alquiler')) {
      $id_alquiler = $this->input->post('id_alquiler');
      $this->Alquiler->devolver($id_alquiler);
    }
    $this->load->model('Socio');
    $consulta = $this->Socio->obtener_socio($num);
    if ($consulta != false) {
      $data = array_merge($data, $consulta);
      $data['filas'] = $this->Alquiler->obtener_alquileres($num);
    }
    $this->template->load('template', 'alquileres_socio', $data);
  }
  
  function solicitar() {
    $data['usuario'] = $this->session->userdata('usuario');
    $data['socio'] = $this->session->userdata('socio');
    $num = $data['socio'];
    if ($this->input->post('codigo')) {      
      $codigo = $this->input->post('codigo');
      $data['codigo'] = $codigo;
      $this->load->model('Pelicula');
      $consulta = $this->Pelicula->obtener_pelicula($codigo);
      if ($consulta != false) {
        $data['pelicula'] = $consulta;
        $data['disponible'] = $this->Pelicula->esta_disponible($codigo);
      }
    }
    $this->load->model('Socio');
    $consulta = $this->Socio->obtener_socio($num);
    if ($consulta != false) {
      $data = array_merge($data, $consulta);
      $data['filas'] = $this->Alquiler->obtener_alquileres($num);
    }
    $this->template->load('template', 'alquileres_socio', $data);
  }
  
  function alquilar() {
    $data['usuario'] = $this->session->userdata('usuario');
    $data['socio'] = $this->session->userdata('socio');
    $num = $data['socio'];
    if ($this->input->post('id_pelicula')) {      
      $id_pelicula = $this->input->post('id_pelicula');
      $this->Alquiler->alquilar($id_pelicula, $this->session->userdata('socio'));
    }
    $this->load->model('Socio');
    $consulta = $this->Socio->obtener_socio($num);
    if ($consulta != false) {
      $data = array_merge($data, $consulta);
      $data['filas'] = $this->Alquiler->obtener_alquileres($num);
    }
    $this->template->load('template', 'alquileres_socio', $data);
  }
  
}
?>
