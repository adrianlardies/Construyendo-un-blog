<?php

require 'admin/config.php'; // Es también lo primero que hacemos, llamar a nuestro archivo config.
require 'functions.php';

// Así es nuestro código antes de hacer una función para conectarnos a la base de datos.

// try {
// 	$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
// 	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// // Prepared Statement
// 	// 1.- Preparamos nuestra sentencia SQL.
// 	$statement = $conexion->prepare('SELECT * FROM articulos');

// 	// 2.- Ejecutamos.
// 	$statement->execute();
// 	$resultados = $statement->fetchAll();
	

// } catch (PDOException $e) {
// 	echo 'ERROR:' . $e->getMessage();
// 	// Si hay algún error podemos redirigir al usuario a una página de error.

// 	header('Location: error.php');
// 	die('Problemas con la conexion');
// }

$conexion = conexion($bd_config); // Esta función conexión está construida en functions.php

if (!$conexion) {
	header('Location: error.php'); 
}

// Este código es el que usaremos antes de programar la paginación.

// $sentencia = $conexion->prepare("SELECT * FROM articulos LIMIT $post_por_pagina");
// $sentencia->execute();
// $posts = $sentencia->fetchAll();

// Traemos los post dependiendo de cuántos por página y en qué página nos encontremos.

// 2.- Convertimos todo el código en funciones para poder reutilizarlas en la paginación del admin.

// Obtenemos los post. En varios sitio debemos traer los post por lo que lo configuramos en una función para poder reutilizarla.
# Está configurada en functions.php
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);
// print_r($post); para comprobar yendo posteriormente al código fuente lo que estamos insertando,
# un array de 2 arrays (1 array por artículo).

// Si no hay post entonces redirigimos a la página del error.
if(!$posts){
	header('Location: error.php');
}

require 'views/index.view.php'; // Siempre, para cargar el archivo para de la vista a este que es el de la lógica.
# Es el 1er paso a realizar.

?>