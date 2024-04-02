<?php session_start(); // Esto lo vamos a hacer con todos los archivos que tengamos dentro de la carpeta admin,
# porque estos archivos queremos que esten protegidos para que estén disponibles únicamente para la persona que
# ha iniciado sesión, es decir, el admin.
require 'config.php';
require '../functions.php'; // .. es para retroceder un directorio.

$conexion = conexion($bd_config);

// Comprobamos si la sesión esta iniciada, sino, redirigimos.
comprobarSession();


if (!$conexion) {
	header("Location: ../error.php");
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

require '../views/admin_index.view.php';
?>