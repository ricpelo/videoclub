<?php
define("FPP", 5);

class Peliculas extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Pelicula');
    if (!$this->session->userdata('usuario')) {
      redirect('usuarios/login');
    }
  }

  private function crear_enlaces($pag, $npags) {
    $enlaces = '';

    if ($pag > 1) {
      $enlaces .= anchor('peliculas/index/' . ($pag - 1), 'Anterior') . " ";
    } else {
      $enlaces .= 'Anterior ';
    }
    for ($i = 1; $i <= $npags; $i++) {
      if ($pag == $i) {
        $enlaces .= "$i ";
      } else {
        $enlaces .= anchor("peliculas/index/$i", $i) . " ";
      }
    }
    if ($pag < $npags) {
      $enlaces .= anchor('peliculas/index/' . ($pag + 1), 'Siguiente');
    } else {
      $enlaces .= 'Siguiente';
    }

    return $enlaces;
  }
    
  function index($pag = 1) {
	$activa = 'a';
	$campo = '';
	$filtro = '';
    if($this->input->post('filtrar')){
	$activa = $this->input->post('activa');
	$campo = $this->input->post('campo');
	$filtro = $this->input->post('filtro');
    }
    $this->load->model('Socio');
    $nfilas = $this->Socio->numero_socios();
    $npags = max(ceil($nfilas / FPP), 1);
    $pag = max($pag, 1);
    $nfilas = $this->Pelicula->numero_peliculas();
    $npags = ceil($nfilas / FPP);

    if ($pag > $npags) {
        redirect('peliculas/index');
    }
    $data['filas']   = $this->Pelicula->obtener_todas(FPP, ($pag - 1) * FPP, $activa, $campo, $filtro);
    $data['exito']   = $this->session->flashdata('exito');
    $data['usuario'] = $this->session->userdata('usuario');
    $data['enlaces'] = $this->crear_enlaces($pag, $npags);

    $this->template->load('template', 'peliculas_index', $data);
  }
  
  function editar($num = null) {
    $data['usuario'] = $this->session->userdata('usuario');
  	$this->load->library('form_validation');
  	$this->form_validation->set_rules('codigo', 'Codigo',
  	                        'trim|required|is_natural_no_zero');
  	$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required');
  	$this->form_validation->set_rules('precio_alq', 'Precio alquiler', 'trim|required');
	
    if (!$this->input->post('editar')) {
      $consulta = $this->Pelicula->obtener_pelicula($num);
      if (!$consulta) {
        $this->template->load('template', 'peliculas_editar_error');
      } else {
        $data = array_merge($data, $consulta);
      	$this->template->load('template', 'peliculas_editar', $data);
      }
    } else {
      $codigo = $this->input->post('codigo');
      $titulo = $this->input->post('titulo');
      $precio_alq = $this->input->post('precio_alq');
      $fech_alt_pel = $this->input->post('fech_alt_pel');
      $activa = $this->input->post('activa'); 
      $id_socio = $this->input->post('id_socio');
      if ($this->form_validation->run() == TRUE) {
        $this->Pelicula->cambiar_pelicula($id_socio, $codigo, $titulo, $precio_alq, $fech_alt_pel, $activa);
        $this->session->set_flashdata('exito', 'Pelicula cambiada con éxito');
        redirect('peliculas/index');          
      } else {
        $data['codigo'] = $codigo;
        $data['titulo'] = $titulo;
	$data['precio_alq'] = $precio_alq;
	$data['fech_alt_pel'] = $fech_alt_pel;
	$data['activa'] = $activa;
        $this->template->load('template', 'peliculas_editar', $data);
      }
    }
  }
 
  function crear() {
	$data['usuario'] = $this->session->userdata('usuario');
  	$this->load->library('form_validation');
  	$this->form_validation->set_rules('codigo', 'Código',
  	                        'trim|required|is_natural_no_zero|callback_codigo_unico');
  	$this->form_validation->set_rules('titulo', 'Título', 'trim|required');
  	$this->form_validation->set_rules('precio_alq', 'Precio alquiler', 'trim|required');
  	
    if (!$this->input->post('crear')) {
      $this->template->load('template', 'peliculas_crear', $data);
    } else {
      if ($this->form_validation->run() == TRUE) {
        $codigo = $this->input->post('codigo');
        $titulo = $this->input->post('titulo');
        $precio_alq = $this->input->post('precio_alq');
        $this->Pelicula->crear_pelicula($codigo, $titulo, $precio_alq);
        $this->session->set_flashdata('exito', 'Pelicula creada con éxito');
        redirect('peliculas/index');
      } else {
        $this->template->load('template', 'peliculas_crear', $data);
      }
    }
  }
  
  function codigo_unico($cod) {
    $consulta = $this->Pelicula->obtener_pelicula($cod);
    if ($consulta) {
      $this->form_validation->set_message('codigo_unico', 'El campo %s debe ser único');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  function borrar($codigo) {
        $this->Pelicula->borrar_pelicula($codigo);
        redirect('peliculas/index');

  }
}
?>
