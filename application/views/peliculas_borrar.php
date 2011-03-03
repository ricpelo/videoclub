<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Borrar película</title>
  <link href="../estilos/videoclub.css" rel="stylesheet" type="text/css">
  </head>
    <body>
    <div id="principal">
	<div id="cabecera">
	  <h1>Gestión de Videoclub</h1>
	  <?= cabecera() ?>
	</div>
    <div id="validaciones"><p><?= validation_errors() ?></p></div>
    <div id="contenido">
    <p><?= form_open('peliculas/borrar') ?>
      <?= form_label('¿Desea borrar la película','codigo') ?>
      <?= form_hidden('codigo',set_value('codigo', $codigo)) ?>
      <?= form_label($codigo.'?', set_value('codigo', $codigo)) ?><br/>
      <?= form_submit('borrar', 'Si') ?>
      <?= anchor('peliculas/index', 'No') ?>
    <?= form_close() ?></p>
    </div>
    <div id="pie_pag">&copy; Alumnos de 2º DAI, IES Doñana, 2011</div>
  </div> 
  </body>
</html>
