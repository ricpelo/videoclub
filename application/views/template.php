<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title> <?php $title ?> </title>
  <?= link_tag('estilos/videoclub.css') ?>
  </head>
  <body>
  <div id="principal">
	<div id="cabecera">
	  <h1>Gestión de Videoclub</h1>
	  <p><h3><?= anchor('principales/index', 'Menu Principal |') . " " . anchor('socios/index/', 'Socios |') . " " . anchor('peliculas/index/', 'Peliculas |') . " " . anchor('alquileres/index/', 'Alquileres') . " " . form_open('usuarios/logout') . '<p align="right">Usuario: ' . $usuario . " ". form_submit('salir', 'Salir') . "</p>" . form_close() ?></h3><hr/></p>
	</div>
    <div id="validaciones"><p><?= validation_errors() ?></p></div>
    <div id="contenido">
    <p><?= $contents ?></p>
     </div>
    <div id="pie_pag">&copy; Alumnos de 2º DAI, IES Doñana, 2011</div>
  </div>
  </body>
</html>
