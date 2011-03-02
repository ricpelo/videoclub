<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Crear un nuevo socio</title>
  </head>
  <body>
    <?= cabecera() ?>
    <div><p><?= validation_errors() ?></p></div>
    <p><?= form_open('socios/crear') ?>
      <?= form_label('Número:', 'numero') ?>
      <?= form_input('numero', set_value('numero')) ?><br/>
      <?= form_label('Nombre:', 'nombre') ?>
      <?= form_input('nombre', set_value('nombre')) ?><br/>
      <?= form_label('Apellidos:', 'apellidos') ?>
      <?= form_input('apellidos', set_value('apellidos')) ?><br/>
      <?= form_submit('crear', 'Crear') ?>
      <?= anchor('socios/index', 'Volver') ?>
    <?= form_close() ?></p>
  </body>
</html>

