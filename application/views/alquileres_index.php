
  <p><?= validation_errors() ?></p>
  <?= $exito ?><br/>
  <?= form_open('alquileres/seleccionar_socio') ?>
  <?= form_label('Número:', 'numero') ?>
  <?= form_input('numero', set_value('numero')) ?><br/>
  <?= form_submit('buscar', 'Buscar socio') ?>
  <?= form_close() ?>
  
