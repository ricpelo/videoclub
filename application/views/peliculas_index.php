<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Listado de películas disponibles</title>
  <?= link_tag('estilos/videoclub.css') ?>
  </head>
  <body>
      <div id="principal">
	<div id="cabecera">
	  <h1>Gestión de Videoclub</h1>
	  <?= cabecera() ?>
	</div>
    <div id="contenido">
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
     </div>
    <div id="pie_pag">&copy; Alumnos de 2º DAI, IES Doñana, 2011</div>
  </div>
  </body>
</html>
