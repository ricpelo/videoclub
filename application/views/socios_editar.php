<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Editar socio</title>
  </head>
  <body>
   <?= cabecera() ?>
    <p><?= validation_errors() ?></p>
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
  </body>
</html>

