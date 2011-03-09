
    <p><?= form_open('usuarios/crear') ?>
      <?= form_label('Nombre:', 'nombre') ?>
      <?= form_input('nombre', set_value('nombre')) ?><br/>
      <?= form_label('Contraseña:', 'password') ?>
      <?= form_password('password', set_value('password')) ?><br/>
      <?= form_label('Confirmar contraseña:', 'passconf') ?>
      <?= form_password('passconf', set_value('passconf')) ?><br/>
      <?= form_submit('crear', 'Crear') ?>
      <?= anchor('usuarios/login', 'Volver') ?>
    <?= form_close() ?></p>

