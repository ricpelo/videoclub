
    <p><?= $exito ?></p>
    <p><?= form_open('usuarios/login') ?>
      <?= form_label('Nombre:', 'nombre') ?>
      <?= form_input('nombre') ?><br/>
      <?= form_label('Contraseña:', 'password') ?>
      <?= form_password('password') ?><br/>
      <?= form_submit('login', 'Login') ?>
    <?= form_close() ?>
    <?= form_open('usuarios/crear') ?>
    <?= form_submit('registrarse', 'Registrarse') ?>
    <?= form_close() ?></p>


