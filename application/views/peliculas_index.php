
    <p><?= form_open('peliculas/index') ?>
      <?= form_fieldset('Filtrar')?>
      <?= form_radio(array("name"=>"activa","value"=>"a" ,"checked" => "true")) ?> Activas
      <?= form_radio(array("name"=>"activa", "value"=>"n" ,"checked" => "false")) ?> No activas
      <?= form_radio(array("name"=>"activa","value"=>"t" ,"checked" => "false")) ?> Todas<br/>
      Buscar:
      <?= form_dropdown('campo', array('codigo' => 'Código', 'titulo' => 'Título', 'precio_alq' => 'Precio de alquiler'), 'codigo') ?>
      <?= form_input('filtro') ?>
      <?= form_submit('filtrar', 'Filtrar') ?>
      <?= form_fieldset_close() ?>
    <?= form_close() ?></p>

    <p><?= $exito ?></p>
    <p><table border="0">
      <thead>
<th>Código</th><th>Título</th><th>Precio Alquiler</th><th>Fecha Alta<th>Operaciones</th>
      </thead>
      <tbody>
        <?php foreach ($filas as $fila): ?>
          <tr>
            <td><?= anchor('peliculas/editar/' . $fila['codigo'],
                           $fila['codigo']) ?></td>
            <td><?= anchor('peliculas/editar/' . $fila['codigo'],
                           $fila['titulo']) ?></td>
            <td><?= anchor('peliculas/editar/' . $fila['codigo'],
                           $fila['precio_alq']) ?></td>
            <td><?= anchor('peliculas/editar/' . $fila['codigo'],
                           $fila['fech_alt_pel']) ?></td>
	  <td>
	  <?php if($fila['activa'] == 't'){ ?>
	  <?= anchor('peliculas/borrar/' .  $fila['codigo'],
                           'Desactivar') ?>
	  <?php }else{ ?>
	  <?= anchor('peliculas/borrar/' .  $fila['codigo'],
                           'Activar') ?>
	  <?php } ?>
        <?php endforeach; ?>
      </tbody>
    </table></p>
    <p><?= $enlaces ?></p>
    <p><?= anchor('peliculas/crear/', 'Añadir película') ?></p>
    


