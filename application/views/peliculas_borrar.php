
    <p><?= form_open('peliculas/borrar') ?>
      <?= form_label('¿Desea borrar la película','codigo', 'titulo') ?>
      <?= form_hidden('id_pelicula',set_value('id_pelicula', $id_pelicula)) ?>
      <?= form_label($codigo', '$titulo.'?', set_value('codigo', $codigo)) ?><br/>
      <?= form_submit('borrar', 'Si') ?>
      <?= anchor('peliculas/index', 'No') ?>
    <?= form_close() ?></p>
   
