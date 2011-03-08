
    <p><?= form_open('peliculas/borrar') ?>
      <?= form_label('¿Desea borrar la película','codigo') ?>
      <?= form_hidden('codigo',set_value('codigo', $codigo)) ?>
      <?= form_label($codigo.'?', set_value('codigo', $codigo)) ?><br/>
      <?= form_submit('borrar', 'Si') ?>
      <?= anchor('peliculas/index', 'No') ?>
    <?= form_close() ?></p>
   
