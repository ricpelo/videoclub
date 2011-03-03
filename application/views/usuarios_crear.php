<<<<<<< HEAD
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Crear nuevo usuario</title>
  </head>
  <body>
    <p><?= $une ?></p>
    <p><?= form_open('usuarios/crear') ?>
      <?= form_label('Nombre:', 'nombre') ?>
      <?= form_input('nombre', set_value('nombre')) ?><br/>
      <?= form_label('Contraseña:', 'password') ?>
      <?= form_input('password', set_value('password')) ?><br/>
      <?= form_submit('crear', 'Crear') ?>
    <?= form_close() ?></p>
  </body>
</html>

=======
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Crear nuevo usuario</title>
  <link href="../estilos/videoclub.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="principal">
	<div id="cabecera">
	  <h1>Gestión de Videoclub</h1>
	  <p><?= cabecera() ?></p>
	</div>
    <div id="contenido">
    <p><?= form_open('usuarios/crear') ?>
      <?= form_label('Nombre:', 'nombre') ?>
      <?= form_input('nombre', set_value('nombre')) ?><br/>
      <?= form_label('Contraseña:', 'password') ?>
      <?= form_input('password', set_value('password')) ?><br/>
      <?= form_submit('crear', 'Crear') ?>
    <?= form_close() ?></p>
     </div>
    <div id="pie_pag">&copy; Alumnos de 2º DAI, IES Doñana, 2011</div>
  </div>
  </body>
</html>

>>>>>>> b9b98b134a11c089ee28de16753e3c3a20303469
