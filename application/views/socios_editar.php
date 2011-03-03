<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Editar socio</title>
  <link href="../estilos/videoclub.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <div id="principal">
	<div id="cabecera">
	  <h1>Gestión de Videoclub</h1>
	  <p><?= cabecera() ?></p>
	</div>
    <div id="validaciones"><p><?= validation_errors() ?></p></div>
    <div id="contenido">
    <p><?= form_open('socios/editar') ?>
      <?= form_label('Número:', 'numero') ?>
      <?= form_input('numero', set_value('numero', $numero), 'readonly') ?><br/>
      <?= form_label('Nombre:', 'nombre') ?>
      <?= form_input('nombre', set_value('nombre', $nombre)) ?><br/>
      <?= form_label('Apellidos:', 'apellidos') ?>
      <?= form_input('apellidos', set_value('apellidos', $apellidos)) ?><br/>
      <?= form_submit('editar', 'Editar') ?>
      <?= anchor('socios/index', 'Volver') ?>
    <?= form_close() ?></p>
     </div>
    <div id="pie_pag">&copy; Alumnos de 2º DAI, IES Doñana, 2011</div>
  </div>
  </body>
</html>

