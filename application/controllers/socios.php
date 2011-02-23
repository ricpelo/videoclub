<?php

define("FPP", 4);

class Socios extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('Socio');
    if (!$this->session->userdata('usuario')) {
      redirect('usuarios/login');
    }
  }

  private function crear_enlaces($pag, $npags) {
    $enlaces = '';

    if ($pag > 1) {
      $enlaces .= anchor('socios/index/' . ($pag - 1), 'Anterior') . " ";
    } else {
      $enlaces .= 'Anterior ';
    }
    for ($i = 1; $i <= $npags; $i++) {
      if ($pag == $i) {
        $enlaces .= "$i ";
      } else {
        $enlaces .= anchor("socios/index/$i", $i) . " ";
      }
    }
    if ($pag < $npags) {
      $enlaces .= anchor('socios/index/' . ($pag + 1), 'Siguiente');
    } else {
      $enlaces .= 'Siguiente';
    }

    return $enlaces;
  }
    
  function index($pag = 1) {
    $nfilas = $this->Socio->numero_socios();
    $npags = ceil($nfilas / FPP);
    if ($pag > $npags) {
      redirect('socios/index');
    }
    $data['filas']   = $this->Socio->obtener_todos(FPP, ($pag - 1) * FPP);
    $data['exito']   = $this->session->flashdata('exito');
    $data['usuario'] = $this->session->userdata('usuario');
    $data['enlaces'] = $this->crear_enlaces($pag, $npags);

    $this->load->view('socios_index', $data);
  }
  
  function editar($num = null) {
    $data['usuario'] = $this->session->userdata('usuario');
  	$this->load->library('form_validation');
  	$this->form_validation->set_rules('numero', 'Número',
  	                        'trim|required|is_natural_no_zero|callback_numero_unico');
  	$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
  	$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
    if (!$this->input->post('editar')) {
      $consulta = $this->Socio->obtener_socio($num);
      if (!$consulta) {
        $this->load->view('socios_editar_error');
      } else {
        $data = array_merge($data, $consulta);
      	$this->load->view('socios_editar', $data);
      }
    } else {
      $numero = $this->input->post('numero');
      $nombre = $this->input->post('nombre');
      $apellidos = $this->input->post('apellidos');
      if ($this->form_validation->run() == TRUE) {
        $this->Socio->cambiar_socio($numero, $nombre, $apellidos);
        $this->session->set_flashdata('exito', 'Socio cambiado con éxito');
        redirect('socios/index');          
      } else {
        $data['numero'] = $numero;
        $data['nombre'] = $nombre;
        $data['apellidos'] = $apellidos;
        $this->load->view('socios_editar', $data);
      }
    }
  }
  
  function crear() {
  	$this->load->library('form_validation');
  	$this->form_validation->set_rules('numero', 'Número',
  	                        'trim|required|is_natural_no_zero|callback_numero_unico');
  	$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
  	$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
  	
    if (!$this->input->post('crear')) {
      $this->load->view('socios_crear');
    } else {
      if ($this->form_validation->run() == TRUE) {
        $numero = $this->input->post('numero');
        $nombre = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $this->Socio->crear_socio($numero, $nombre, $apellidos);
        $this->session->set_flashdata('exito', 'Socio creado con éxito');
        redirect('socios/index');
      } else {
        $this->load->view('socios_crear');
      }
    }
  }
  
  function numero_unico($num) {
    $consulta = $this->Socio->obtener_socio($num);
    if (!$consulta) {
      $this->form_validation->set_message('numero_unico', 'El campo %s debe ser único');
      return FALSE;
    } else {
      return TRUE;
    }
  }
}
?>
