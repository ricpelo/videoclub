<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Crear una </title>
  </head>
    <body>
    <?= cabecera() ?>
    <div><p><?= validation_errors() ?></p></div>
    <p><?= form_open('peliculas/borrar') ?>
      <?= form_label('¿Desea borrar la película','codigo') ?>
      <?= form_hidden('codigo',set_value('codigo', $codigo)) ?>
      <?= form_label($codigo.'?', set_value('codigo', $codigo)) ?><br/>
      <?= form_submit('borrar', 'Si') ?>
      <?= anchor('peliculas/index', 'No') ?>
    <?= form_close() ?></p>
  </body>
</html>
