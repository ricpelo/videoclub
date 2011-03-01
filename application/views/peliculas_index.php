<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Listado de peliculas Activas</title>
  </head>
  <body>
      <?= form_open('usuarios/logout') ?>
        <p align="right">Usuario: <?= $usuario ?>
        <?= form_submit('salir', 'Salir') ?>
        </p>
      <?= form_close() ?><hr/>
    <p><?= $exito ?></p>
    <p><table border="1">
      <thead>
        <th>Código</th><th>Título</th>><th>Precio Alquiler</th><th>Fecha Alta</th><th>¿Activa?</th>
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
	  <?php if($fila['activa'] == true ){ ?>
	  <?= anchor('peliculas/editar/' . $fila['activa'],
                           'Disponible') ?>
	  <?php }else{ ?>
	  <?= anchor('peliculas/editar/' . $fila['activa'],
                           'No disponible') ?>
	  <?php } ?>
	  </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table></p>
    <p><?= $enlaces ?></p>
  </body>
</html>

