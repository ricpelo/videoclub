<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Crear una Pelicula</title>
  </head>
    <body>
    <div><p><?= validation_errors() ?></p></div>
    <p><?= form_open('peliculas/crear') ?>
      <?= form_label('Codigo:', 'codigo') ?>
      <?= form_input('codigo', set_value('codigo')) ?><br/>
      <?= form_label('Titulo:', 'titulo') ?>
      <?= form_input('titulo', set_value('titulo')) ?><br/>
      <?= form_label('Precio de Alquiler:', 'precio_alq') ?>
      <?= form_input('precio_alq', set_value('precio_alq')) ?><br/>
      <?= form_submit('crear', 'Crear') ?>
      <?= anchor('socios/index', 'Volver') ?>
    <?= form_close() ?></p>
  </body>
</html>
