
    <p><?= form_open('usuarios/crear') ?>
      <?= form_label('Nombre:', 'nombre') ?>
      <?= form_input('nombre', set_value('nombre')) ?><br/>
      <?= form_label('Contraseña:', 'password') ?>
      <?= form_input('password', set_value('password')) ?><br/>
      <?= form_submit('crear', 'Crear') ?>
    <?= form_close() ?></p>
     
