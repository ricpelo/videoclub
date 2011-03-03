<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Crear nuevo usuario</title>
  </head>
  <body>
    <p><?= $une ?></p>
    <p><?= form_open('usuarios/crear') ?>
      <?= form_label('Nombre:', 'nombre') ?>
      <?= form_input('nombre', set_value('nombre')) ?><br/>
      <?= form_label('Contraseña:', 'password') ?>
      <?= form_input('password', set_value('password')) ?><br/>
      <?= form_submit('crear', 'Crear') ?>
    <?= form_close() ?></p>
  </body>
</html>

