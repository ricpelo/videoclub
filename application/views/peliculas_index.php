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
        <th>Código</th><th>Título</th><th>Precio Compra</th><th>Precio Alquiler</th><th>Fecha Alta</th>
      </thead>
      <tbody>
        <?php foreach ($filas as $fila): ?>
          <tr>
            <td><?= anchor('peliculas/editar/' . $fila['codigo'],
                           $fila['codigo']) ?></td>
            <td><?= anchor('peliculas/editar/' . $fila['titulo'],
                           $fila['titulo']) ?></td>
            <td><?= anchor('peliculas/editar/' . $fila['precio_compra'],
                           $fila['precio_compra']) ?></td>
            <td><?= anchor('peliculas/editar/' . $fila['precio_alquiler'],
                           $fila['precio_alquiler']) ?></td>
            <td><?= anchor('peliculas/editar/' . $fila['fecha_alta'],
                           $fila['fecha_alta']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table></p>
    <p><?= $enlaces ?></p>
  </body>
</html>

