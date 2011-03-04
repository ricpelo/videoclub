
    <p><?= $exito ?></p>
    <p><table border = "0">
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
    <p><?= anchor('socios/crear/', 'Añadir socio') ?></p>
    

