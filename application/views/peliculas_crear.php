
    <p><?= form_open('peliculas/crear') ?>
      <?= form_label('Codigo:', 'codigo') ?>
      <?= form_input('codigo', set_value('codigo')) ?><br/>
      <?= form_label('Titulo:', 'titulo') ?>
      <?= form_input('titulo', set_value('titulo')) ?><br/>
      <?= form_label('Precio de Alquiler:', 'precio_alq') ?>
      <?= form_input('precio_alq', set_value('precio_alq')) ?><br/>
      <?= form_submit('crear', 'Crear') ?>
      <?= anchor('peliculas/index', 'Volver') ?>
    <?= form_close() ?></p>

