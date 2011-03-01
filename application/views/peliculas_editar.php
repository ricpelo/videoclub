<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Editar peliculas</title>
  </head>
  <body>
    <?= form_open('usuarios/logout') ?>
      <p align="right">Usuario: <?= $usuario ?>
      <?= form_submit('salir', 'Salir') ?>
      </p>
    <?= form_close() ?><hr/>
    <p><?= validation_errors() ?></p>
    <p><?= form_open('peliculas/editar') ?>
      <?= form_label('Código:', 'codigo') ?>
      <?= form_input('codigo', set_value('codigo', $codigo), 'readonly') ?><br/>
      <?= form_label('Titulo:', 'titulo') ?>
      <?= form_input('titulo', set_value('titulo', $titulo)) ?><br/>
      <?= form_label('Precio Alq:', 'precio_alq') ?>
      <?= form_input('precio_alq', set_value('precio_alq', $precio_alq)) ?><br/>
      <?= form_label('fecha Alta (dd-mm-yyyy):', 'fech_alt_pel') ?>
      <?= form_input('fech_alt_pel', set_value('fech_alt_pel', $fech_alt_pel)) ?><br/>
      <?= form_submit('editar', 'Editar') ?>
      <?= anchor('socios/index', 'Volver') ?>
    <?= form_close() ?></p>
  </body>
</html>
