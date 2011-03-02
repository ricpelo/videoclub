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
		return "<h3>". anchor('socios/index/', 'Socios //') . " " . anchor('peliculas/index/', 'Peliculas //') . " " . anchor('alquileres/index/', 'Alquileres') . "</h3>";
	}
}
