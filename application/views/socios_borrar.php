<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Borrar Socio</title>
  </head>
    <body>
    <div><p><?= validation_errors() ?></p></div>
    <p><?= form_open('socios/borrar') ?>
      <?= form_label('¿Desea borrar el socio?','numero') ?>
      <?= form_hidden('numero',set_value('numero', $numero)) ?>
      <?= form_label($numero.'?', set_value('numero', $numero)) ?><br/>
      <?= form_submit('borrar', 'Si') ?>
      <?= anchor('socios/index', 'No') ?>
    <?= form_close() ?></p>
  </body>
</html>
