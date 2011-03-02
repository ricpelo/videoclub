<?php
class Socio extends CI_Model {

  function __construct() {
    parent::__construct();
  }
  
  function obtener_todos($limit = '', $offset = 0) {
    if (($limit == '' || $limit >= 0) && $offset >= 0) {
      if (is_numeric($limit)) {
        $limit = "limit $limit";
      }
      $consulta = $this->db->query("select *
                                    from socios
                                    $limit
                                    offset $offset");
      return ($consulta->num_rows() > 0) ? $consulta->result_array() : false;
    } else {
      return false;
    }
  }
  
  function obtener_socio($num) {
    $consulta = $this->db->query("select * from socios
                                  where numero = $num");
    return ($consulta->num_rows() > 0) ? $consulta->row_array() : false;
  }
   
  function cambiar_socio($num, $nom, $ape) {
    return $this->db->query("update socios
                             set nombre = '$nom', apellidos = '$ape'
                             where numero = $num");
  }
  
  function crear_socio($num, $nom, $ape) {
    return $this->db->query("insert into socios (numero, nombre, apellidos)
                             values ($num, '$nom', '$ape')");
  }
  
  function numero_socios() {
    $consulta = $this->db->query("select count(*) as cantidad from socios");
    $cantidad = $consulta->row_array();
    return $cantidad['cantidad'];
  }
  
  function borrar_socio($num) {
    // delete ...
  }
}
?>
