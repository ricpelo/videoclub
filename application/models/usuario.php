<?php
class Usuario extends CI_Model {

  function __construct() {
    parent::__construct();
  }
  function crear_usuario($nombre, $pass){
   $this->db->query("insert into usuarios
        			values(default,'$nombre', md5('$pass'))");
  }
}
