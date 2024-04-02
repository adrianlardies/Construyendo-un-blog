<?php session_start();
require 'admin/config.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Consultamos si los datos los hemos enviado al mismo archivo.
	$usuario = limpiarDatos($_POST['usuario']);
	$password = limpiarDatos($_POST['password']);

	if ($usuario == $blog_admin['usuario'] && $password == $blog_admin['password']) { // Debe de ser igual al usuario y contraseña que establecimos como admin en config.php
		$_SESSION['admin'] = $blog_admin['usuario']; 
		header('Location: '. RUTA . '/admin');
	}
}

require 'views/login.view.php';

?>