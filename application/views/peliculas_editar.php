
    <p><?= form_open('peliculas/editar') ?>
      <?= form_label('Código:', 'codigo') ?>
      <?= form_input('codigo', set_value('codigo', $codigo), 'readonly') ?><br/>
      <?= form_label('Titulo:', 'titulo') ?>
      <?= form_input('titulo', set_value('titulo', $titulo)) ?><br/>
      <?= form_label('Precio Alq:', 'precio_alq') ?>
      <?= form_input('precio_alq', set_value('precio_alq', $precio_alq)) ?><br/>
      <?= form_label('fecha Alta (dd-mm-yyyy):', 'fech_alt_pel') ?>
      <?= form_input('fech_alt_pel', set_value('fech_alt_pel', $fech_alt_pel)) ?><br/>
      <?= form_submit('editar', 'Editar') ?>
      <?= anchor('peliculas/index', 'Volver') ?>
    <?= form_close() ?></p>
    
