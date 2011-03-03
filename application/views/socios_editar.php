
    <p><?= form_open('socios/editar') ?>
      <?= form_label('Número:', 'numero') ?>
      <?= form_input('numero', set_value('numero', $numero), 'readonly') ?><br/>
      <?= form_label('Nombre:', 'nombre') ?>
      <?= form_input('nombre', set_value('nombre', $nombre)) ?><br/>
      <?= form_label('Apellidos:', 'apellidos') ?>
      <?= form_input('apellidos', set_value('apellidos', $apellidos)) ?><br/>
      <?= form_submit('editar', 'Editar') ?>
      <?= anchor('socios/index', 'Volver') ?>
    <?= form_close() ?></p>

    

