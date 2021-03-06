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
      return $consulta->result_array();
    } else {
      return false;
    }
  }
  
  function obtener_socio($num) {
    $consulta = $this->db->query("select * from socios
                                  where numero = $num");
    return ($consulta->num_rows() > 0) ? $consulta->row_array() : false;
  }
   
  function cambiar_socio($id_socio, $num, $nom, $ape) {
    return $this->db->query("update socios
                             set numero = $num, nombre = '$nom', apellidos = '$ape'
                             where id_socio= $id_socio ");
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
  
  function borrar_socio($id) {
    return $this->db->query("delete from socios where id_socio = $id cascade");
  }
}
?>
