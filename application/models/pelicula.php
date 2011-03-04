<?php 
class Pelicula extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function obtener_todas($limit = '', $offset = 0, $activa = 'a', $campo = '', $filtro = '') {
     if (($limit == '' || $limit >= 0) && $offset >= 0) {
      if (is_numeric($limit)) {
        $limit = "limit $limit";
      }
      switch ($activa) {
        case 'a': $activa = 'activa = true'; break;
        case 'n': $activa = 'activa = false'; break;
        case 't': $activa = 'true'; break;
      }

      $where = ($filtro != '') ? "and $campo::text like '$filtro'" : '';
      $where = ($campo != '') ? "and $campo::text like '%$filtro%'" : '';
      $consulta = $this->db->query("select * 
                        				    from peliculas
                        				    where $activa $where
                        				    order by codigo
                        				    $limit
                                    offset $offset");
     return $consulta->result_array();
	 
    } else {
      return false;
    }
  }
  
  function obtener_pelicula($cod) {
    $consulta = $this->db->query("select * from peliculas
                                  where codigo = $cod order by codigo");
    return ($consulta->num_rows() > 0) ? $consulta->row_array() : false;
  }

  function obtener_pelicula_por($campo, $valor) {
    $consulta = $this->db->query("select * from peliculas
                                  where $campo like '$valor'");
    return ($consulta->num_rows() > 0) ? $consulta->row_array() : false;
  }

  function esta_disponible($cod) {
    $consulta = $this->db->query("select * from disponibles_y_activas
                                  where codigo = $cod order by codigo");
    return $consulta->num_rows() == 1;
  }
  
  function esta_alquilada($cod) {
    return !$this->esta_disponible($cod);
  }
  
  function borrar_pelicula($cod) {
    $consulta = $this->db->query("update peliculas									 					set activa = not activa
    				where codigo = $cod");
  }
   
  function cambiar_pelicula($cod, $tit, $pre_alq, $fech_alt) {
    return $this->db->query("update peliculas
                                  set titulo = '$tit', precio_alq = $pre_alq, fech_alt_pel = '$fech_alt'
                                  where codigo = $cod");
  }

  function crear_pelicula($cod, $tit, $pre_alq) {
    return $this->db->query("insert into peliculas(codigo, titulo, precio_alq)values($cod,'$tit',$pre_alq)");
  }

  function numero_peliculas() {
    $consulta = $this->db->query("select count(*) as cantidad from peliculas");
    $cantidad = $consulta->row_array();
    return $cantidad['cantidad'];
  }
}
?>
