<?php
class Pelicula extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function obtener_todas() {
    $consulta = $this->db->query("select * from peliculas");
    return ($consulta->num_rows() > 0) ? $consulta->result_array() : false;
  }
  
  function obtener_pelicula($cod) {
    $consulta = $this->db->query("select * from peliculas
                                  where codigo = $cod");
    return ($consulta->num_rows() > 0) ? $consulta->row_array() : false;
  }
  
  function esta_disponible($cod) {
    $consulta = $this->db->query("select * from disponibles_y_activas
                                  where codigo = $cod");
    return $consulta->num_rows() == 1;
  }
  
  function esta_alquilada($cod) {
    return !$this->esta_disponible($cod);
  }
  
  function borrar_pelicula($cod) {
    // update ...
  }
  
/*   
  function cambiar_socio($num, $nom, $ape) {
    $consulta = $this->db->query("update socios
                                  set nombre = '$nom', apellidos = '$ape'
                                  where numero = $num");
    return $consulta->affected_rows() == 1;
  }
  
  function crear_socio($num, $nom, $ape) {
    $consulta = $this->db->query("insert into socios (numero, nombre, apellidos)
                                  values ($num, '$nom', '$ape')");
    return $consulta->affected_rows() == 1;
  }
*/
  function numero_peliculas() {
    $consulta = $this->db->query("select count(*) as cantidad from peliculas");
    $cantidad = $consulta->row_array();
    return $cantidad['cantidad'];
  }
}
?>
