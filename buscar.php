<?php 

require 'admin/config.php';
require 'functions.php';

// Conectamos a la base de datos.
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

// Comprobamos que haya contenido en GET.
if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])){
	$busqueda = limpiarDatos($_GET['busqueda']); // Para evitar inyección de código.

	$statement =$conexion->prepare( // Búsqueda en la bdd.
		"SELECT * FROM articulos WHERE titulo LIKE :busqueda or texto LIKE :busqueda"
	);
	$statement->execute(array(':busqueda' => "%$busqueda%")); // Aquí le indicamos el valor del placeholder. Sin % buscaría que sea exacto el título o el texto, con % buscamos simplemente que esté incluido el término que estamos buscando en la búsqueda.

	$resultados = $statement->fetchAll();
	
	if (empty($resultados)) {
		$titulo = 'No se encontraron artículos con el resultado: ' . $busqueda;
	} else {
		$titulo = 'Resultados de la búsqueda: ' . $busqueda;
	}

} else {
	header('Location:' . RUTA . '/index.php');
}

require 'views/buscar.view.php';

?>