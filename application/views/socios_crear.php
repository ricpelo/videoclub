
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
     

