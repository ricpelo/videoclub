<?php 
class Alquiler extends CI_Model {

  function __construct() {
    parent::__construct();
  }
  
  function obtener_alquileres($num) {
    $consulta = $this->db->query("select * from alquileres natural join peliculas
                                                natural join socios
                                  where fdev is null and 
                                  id_socio = (select id_socio from socios
                                              where numero = $num)");
    return ($consulta->num_rows() > 0) ? $consulta->result_array() : null;
  }
  
  function devolver($id_alquiler) {
    $consulta = $this->db->query("update alquileres
                                  set fdev = current_date
                                  where id_alquiler = $id_alquiler");
    return $this->db->affected_rows() == 1;
  }
  
  function alquilar($id_pelicula, $num) {
    $consulta = $this->db->query("insert into alquileres 
                                  (id_socio, id_pelicula, falq)
                                  (select id_socio, $id_pelicula, current_date 
                                   from socios where numero = $num)");
    return $this->db->affected_rows() == 1;  }
}
