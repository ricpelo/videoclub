
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
    <?= form_close() ?></p>


