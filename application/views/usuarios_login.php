<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Autenticarse</title>
  </head>
  <body>
    <p><?= $une ?></p>
    <p><?= form_open('usuarios/login') ?>
      <?= form_label('Nombre:', 'nombre') ?>
      <?= form_input('nombre') ?><br/>
      <?= form_label('Contraseña:', 'password') ?>
      <?= form_password('password') ?><br/>
      <?= form_submit('login', 'Login') ?>
    <?= form_close() ?>
    <?= form_open('usuarios/crear') ?>
    <?= form_submit('crear', 'Registrarse') ?>
    <?= form_close() ?></p
  </body>
</html>

