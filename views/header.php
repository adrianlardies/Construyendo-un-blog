<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Blog</title>
	<link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilos.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	<header> <!-- Trabajamos con el encabezado. -->
		<div class="contenedor">
			<div class="logo izquierda">
				<p><a href="<?php echo RUTA; ?>">Mi primer blog</a></p>
			</div>

			<div class="derecha">
				<form action="<?php echo RUTA; ?>/buscar.php" method="get" name="busqueda" class="buscar"> <!-- Los datos del formulario
				los tenemos que recibir en buscar.php para poder trabajarlos. -->
					<input type="text" name="busqueda" placeholder="Buscar">
					<button type="submit" class="icono fa fa-search"></button>
				</form>
				
				<nav class="menu">
					<ul>
						<li>
							<a href="#"><i class="fa fa-twitter"></i></a> <!-- # es simplemente un elemento que colocamos
							para habilitar correctamente el enlace sin indicar una url real en href. -->
						</li>
						<li>
							<a href=""><i class="fa fa-facebook"></i></a>
						</li>
						<li><a href="#">Contacto<i class="icono fa fa-envelope"></i></a></li> <!-- El formulario de contacto no lo
						trabajamos en esta práctica, pero lo podemos enlazar con el trabajo previo de formulario que hemos hecho. -->
					</ul>
				</nav>
			</div>
		</div>
	</header>