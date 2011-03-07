
    <p><?= form_open('socios/borrar') ?>
      <?= form_label('¿Desea borrar el socio','numero') ?>
      <?= form_hidden('id_socio',set_value('id_socio', $id_socio))?>
      <?= form_label($numero.'?', set_value('numero', $numero)) ?><br/>
      <?= form_submit('borrar', 'Si') ?>
      <?= anchor('socios/index', 'No') ?>
    <?= form_close() ?></p>
   
