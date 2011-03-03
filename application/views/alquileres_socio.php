<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Gestión de alquileres - Alquileres de <?= $nombre." ".$apellido ?></title>
  </head>
  <body>
  <?= cabecera() ?>
  <p><?= validation_errors() ?></p>
  <p><fieldset><legend>Datos del socio</legend>
  <?= $numero ?><br/>
  <?= $nombre." ".$apellido ?><br/>
  <?= $direccion ?><br/>
  <?= $poblacion."(".$provincia.")" ?><br/>
  <?= $telefono ?></fieldset></p>
  <?php if (isset($filas)): ?>
  <div style="margin: 30px">
              <p align="center" style="font-size:1.7em">Pendientes del socio</p>
              <table border="1" style="margin:auto">
                <thead>
                  <th>Código</th><th>Título</th><th>Fecha alquiler</th><th>Devolver</th>
                </thead>
                <tbody>
                <?php foreach ($filas as $fila): ?>
                <tr>
                  <td><?= $codigo ?></td>
                  <td><?= $titulo ?></td>
                  <td><?= $falq ?></td>
                  <td>
                  <?= form_open('alquileres/devolver') ?>
                  <?= form_hidden('id_alquiler', $id_alquiler) ?>
                  <?= form_submit('devolver', 'Devolver') ?>
                  <?= form_close() ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
  </div>
  <?php endif; ?>
  <?= form_open('alquileres/solicitar') ?>
  <?= form_label('Codigo:', 'codigo') ?>
  <?= form_input('codigo', set_value('codigo')) ?>
  <?= form_submit('buscar', 'Buscar') ?>
  <?= form_close() ?>
  <?php if (isset($pelicula)): ?>
  <div style="margin: 30px">
    <?= $titulo ?><br/>
    <?= $precio_alquiler ?><br/>
    <?= if ($disponible): ?>
    <?= form_open('alquileres/alquilar') ?>
    <?= form_hidden('id_pelicula', $id_pelicula)) ?>
    <?= form_submit('alquilar', 'Alquilar') ?>
    <?= form_close() ?>
    <?= else: ?>
    No disponible
    <?= endif; ?>
  </div>
  <?php endif; ?>
  </body>
</html>

