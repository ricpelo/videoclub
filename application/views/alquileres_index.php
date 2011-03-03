<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Gestión de alquileres - Solicitud de socio</title>
  </head>
  <body>
  <?= cabecera() ?>
  <p><?= validation_errors() ?></p>
  <?= form_open('alquileres/seleccionar_socio') ?>
  <?= form_label('Número:', 'numero') ?>
  <?= form_input('numero', set_value('numero')) ?><br/>
  <?= form_submit('buscar', 'Buscar socio') ?>
  <?= form_close() ?>
  </body>
</html>
