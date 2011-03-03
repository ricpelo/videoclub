<<<<<<< HEAD
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Menú principal</title>
  </head>
  <body>
	 <?= cabecera() ?>

   
	 <p align="center"><h2>Gestión Videoclub</h2></p><br>
         <p align="center"><?= anchor('socios/index/','Ir a gestión de socio') ?></td> <p/>
 	 <p align="center"><?= anchor('peliculas/index/','Ir a gestión de peliculas') ?></td>
	<p align="center"><?= anchor('alquileres/index/','Ir a gestión de Alquileres') ?></td>
 <p/>
	

      
            
           
  </body>
</html>
=======
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Menú principal</title>
  <link href="../estilos/videoclub.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <div id="principal">
	<div id="cabecera">
	  <h1>Gestión de Videoclub</h1>
	  <?= cabecera() ?>
	</div>
    <div id="contenido">
	 <p><?= anchor('socios/index/','Ir a gestión de socio') ?></td> <p/>
 	 <p><?= anchor('peliculas/index/','Ir a gestión de peliculas') ?></td> <p/>
    </div>
    <div id="pie_pag">&copy; Alumnos de 2º DAI, IES Doñana, 2011</div>
  </div>         
  </body>
</html>
>>>>>>> 53c0a73f09bb0b76d2753960e9f95ba5e8d91e91
