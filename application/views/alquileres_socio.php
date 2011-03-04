
  <?= form_open('alquileres/seleccionar_socio') ?>
  <?= form_label('Número:', 'numero') ?>
  <?= form_input('numero', set_value('numero')) ?><br/>
  <?= form_submit('buscar', 'Buscar socio') ?>
  <?= form_close() ?>
  <p><fieldset><legend>Datos del socio</legend>
  <?= $numero ?><br/>
  <?= $nombre." ".$apellidos ?><br/>
  <?= $direccion ?><br/>
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
                  <td><?= $fila['codigo'] ?></td>
                  <td><?= $fila['titulo'] ?></td>
                  <td><?= $fila['falq'] ?></td>
                  <td>
                  <?= form_open('alquileres/devolver') ?>
                  <?= form_hidden('id_alquiler', $fila['id_alquiler']) ?>
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
  <?= form_label('Codigo:', 'cod') ?>
  <?= form_input('codigo', set_value('codigo')) ?>
  <?= form_submit('buscar', 'Buscar') ?>
  <?= form_close() ?>
  <?php if (isset($pelicula)): ?>
  <div style="margin: 30px">
    <?= $pelicula['titulo'] ?><br/>
    <?= $pelicula['precio_alq'] ?><br/>
    <?php if ($disponible): ?>
    <?= form_open('alquileres/alquilar') ?>
    <?= form_hidden('id_pelicula', $pelicula['id_pelicula']) ?>
    <?= form_submit('alquilar', 'Alquilar') ?>
    <?= form_close() ?>
    <?php else: ?>
    No disponible
    <?php endif; ?>
  </div>
  <?php endif; ?>
    </div>    
   

