<?php
class Usuario extends CI_Model {

  function __construct() {
    parent::__construct();
  }
  function crear_usuario($nombre, $pass){
   $this->db->query("insert into usuarios
        			values(default,'$nombre', md5('$pass'))");
  }
    function obtener_usuario($nombre) {
    $consulta = $this->db->query("select * from usuarios
                                  where nombre_usuario = '$nombre'");
    return ($consulta->num_rows() > 0) ? $consulta->row_array() : false;
  }
}
