<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Editar pelicula</title>
  </head>
  <body>
    <?= form_open('usuarios/logout') ?>
      <p align="right">Usuario: <?= $usuario ?>
      <?= form_submit('salir', 'Salir') ?>
      </p>
    <?= form_close() ?><hr/>
    <p><?= validation_errors() ?></p>
    <p><?= form_open('peliculas/editar') ?>
      <?= form_label('Número:', 'numero') ?>
      <?= form_input('numero', set_value('numero', $numero), 'readonly') ?><br/>
      <?= form_label('Titulo:', 'titulo') ?>
      <?= form_input('titulo', set_value('titulo', $titulo)) ?><br/>
      <?= form_label('Precio de compra:', 'precio_compra') ?>
      <?= form_input('precio_compra', set_value('precio_compra', $precio_compra)) ?><br/>
      <?= form_label('Precio de alquiler:', 'precio_alquiler') ?>
      <?= form_input('precio_alquiler', set_value('precio_alquiler', $precio_alquiler)) ?><br/>
      <?= form_label('Activa:', 'activa') ?>
      <?= form_input('activa', set_value('activa', $activa)) ?><br/>
      <?= form_submit('editar', 'Editar') ?>
      <?= anchor('socios/index', 'Volver') ?>
    <?= form_close() ?></p>
  </body>
</html>

