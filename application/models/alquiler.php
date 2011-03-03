<?php 
class Alquiler extends CI_Model {

  function __construct() {
    parent::__construct();
  }
  
  function obtener_alquileres($num) {
    $consulta = $this->db->query("select * from alquileres
                                  where fdev is null and 
                                  id_socio = (select id_socio from socios
                                              where numero = $num)");
    return ($consulta->num_rows() > 0) ? $consulta->row_array() : false;
  }
  
  function devolver($id_alquiler) {
    $consulta = $this->db->query("update alquileres
                                  set fdev = current_date
                                  where id_alquiler = $id_alquiler");
    return $consulta->affected_rows() == 1;
  }
  
  function alquilar($id_pelicula, $num) {
    $consulta = $this->db->query("insert into alquileres 
                                  (id_socio, id_pelicula, falq)
                                  values
                                  (select id_socio, $id_pelicula, current_date 
                                   from socios where numero = $num)");
    return $consulta->affected_rows() == 1;  }
}
