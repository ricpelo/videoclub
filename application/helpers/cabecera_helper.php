<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Helper de cabecera
  @autor: Carlos Villalón
  @company: 2DAI IES Doñana
 */

if ( ! function_exists('cabecera'))
{
	function cabecera()
	{
	  $CI =& get_instance();
		return "<h3>". anchor('socios/index/', 'Socios //') . " " . anchor('peliculas/index/', 'Peliculas //') . " " . anchor('alquileres/index/', 'Alquileres') . " " . form_open('usuarios/logout') . '<p align="right">Usuario: ' . $CI->session->userdata('usuario') . " ". form_submit('salir', 'Salir') . "</p>" . form_close() . "</h3><hr/>";
	}
}
