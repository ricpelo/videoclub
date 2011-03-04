
    <p><?= form_open('socios/borrar') ?>
      <?= form_label('¿Desea borrar el socio','numero') ?>
      <?= form_hidden('numero',set_value('numero', $numero)) ?>
      <?= form_label($numero.'?', set_value('numero', $numero)) ?><br/>
      <?= form_submit('borrar', 'Si') ?>
      <?= anchor('socios/index', 'No') ?>
    <?= form_close() ?></p>
   
