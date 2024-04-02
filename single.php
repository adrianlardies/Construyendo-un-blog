<?php 

require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
// $id_articulo = (int)limpiarDatos($_GET['id']); -> Esto es a lo que corresponde la línea de abajo (simplemente se sustituye la función por el código que hace la propia función (configurada en functions.php)).
$id_articulo = id_articulo($_GET['id']);

if (!$conexion) {
	header('Location: error.php');
}

if (empty($id_articulo)) {
	header('Location: index.php');
}

$post = obtener_post_por_id($conexion, $id_articulo); // $id_articulo es un id que es lo que debemos pasar como parámetro.

if (!$post) {
	// Redirigimos al index si no hay post.
	header('Location: index.php');
}

$post = $post[0]; // En la posición 0 que es el primer array (primer post).

require 'views/single.view.php';

?>