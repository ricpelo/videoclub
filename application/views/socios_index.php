<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Listado de socios del videoclub</title>
  <link href="../estilos/videoclub.css" rel="stylesheet" type="text/css"></head>
  <body>
    <div id="principal">
	<div id="cabecera">
	  <h1>Gestión de Videoclub</h1>
	  <p><?= cabecera() ?></p>
	</div>
    <div id="contenido">
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
    </div>
    <div id="pie_pag">&copy; Alumnos de 2º DAI, IES Doñana, 2011</div>
  </div>
</body>
</html>

