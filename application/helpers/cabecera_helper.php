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
<<<<<<< HEAD
		return "<h3>". anchor('socios/index/', 'Socios //') . " " . anchor('peliculas/index/', 'Peliculas //') . " " . anchor('alquileres/index/', 'Alquileres') . "</h3>";
=======
		return "<h3>". anchor('socios/index/', 'Socios //') . " " . anchor('peliculas/index/', 'Peliculas //') . " " . anchor('alquileres/index/', 'Alquileres') . " " . form_open('usuarios/logout') . "<p align=\"right\">Usuario:" . $usuario . form_submit('salir', 'Salir') . "</p>" . form_close() "</h3>";
>>>>>>> dbd9dbb3c0b3db44ab2c5605026f510df51d5ad8
	}
}
