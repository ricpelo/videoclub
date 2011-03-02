<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Listado de socios del videoclb</title>
  </head>
  <body>
	<?= cabecera() ?>
      <p>
      
    <p><?= $exito ?></p>
    <p><table border="1">
      <thead>
        <th>Número</th><th>Nombre</th><th>Apellidos</th><th colspan="2">Operaciones</th>
      </thead>
      <tbody>
        <?php foreach ($filas as $fila): ?>
          <tr>
            <td><?= anchor('socios/editar/' . $fila['numero'],
                           $fila['numero']) ?></td>
            <td><?= anchor('socios/editar/' . $fila['numero'],
                           $fila['nombre']) ?></td>
            <td><?= anchor('socios/editar/' . $fila['numero'],
                           $fila['apellidos']) ?></td>
	  <td><?= anchor('socios/borrar/' . $fila['numero'], 'Borrar') ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table></p>
    <p><?= $enlaces ?></p>
  </body>
</html>

