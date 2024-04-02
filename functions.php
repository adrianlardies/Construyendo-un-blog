<?php

// Función para conectarnos a la base de datos ya que la vamos a estar utilizando constantemente.
// Return: la conexión o false si hubo un problema.
function conexion($bd_config){ // El array $bd_config es el que creamos en config.php previamente.
	try {
	$conexion = new PDO('mysql:host=localhost:3307;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion; // Si es correcta.

	} catch (PDOException $e) {
		return false; // Si es incorrecta.
	}
}

// Función para limpiar y convertir datos como espacios en blanco, barras y caracteres especiales en entidades HTML.
// Return: los datos limpios y convertidos en entidades HTML.
function limpiarDatos($datos){
	// Eliminamos los espacios en blanco al inicio y final de la cadena.
	$datos = trim($datos); // Datos son los datos que le pasamos que ha su vez se vuelven a almacenar en la
    # misma variable una vez se ha ejecutado la función.

	// Quitamos las barras /
	$datos = stripslashes($datos);

	// Convertimos caracteres especiales en entidades HTML (&, "", '', <, >).
	$datos = htmlspecialchars($datos);
	
    return $datos;
}

// Función para obtener un post por id.
// Return: El post, o false si no se encontró ningún post con ese id.
function obtener_post_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1"); // query lo vimos en pdo, la podemos ejecutar
    # cuando podamos traer artículos simples. LIMIT 1 por cuestiones de seguridad.
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false; // Si hay un artículo que tenga el id que le pasamos entonces nos lo devuelve,
    # de otra forma nos va a devolver false.
}


function id_articulo($id){ // Limpiamos los datos a través de la función que hemos configurado más arriba pero aparte vamos
    # a castear el dato en entero para que el usuario no pueda inyectar código que no sea un número.
	return (int)limpiarDatos($id);
}


// Función para obtener la página actual.
// Return: El número de la página si está seteado, sino entonces retorna 1.
function pagina_actual(){
	return isset($_GET['p']) ? (int)$_GET['p']: 1; // El valor 'p' es la página.
}


// Función para obtener los post determinando cuántos queremos traer por página, lo calcula según la página en la que estemos.
// Return: Los post dependiendo de la página que estemos y cuántos post por página establecimos.
function obtener_post($post_por_pagina, $conexion){
	// 1.- Obtenemos la pagina actual a través de la función que hemos definido previamente.

	// 2.- Determinamos desde qué post se mostrará en pantalla.
	$inicio = (pagina_actual() > 1) ? (pagina_actual() * $post_por_pagina - $post_por_pagina) : 0; // En la práctica de la paginación
    # hicimos la variable con la misma lógica. Va a caclcular desde que post va a traer dependiendo de la página
    # en la que se encuentre el usuario.

	// 3.- Preparamos nuestra consulta trayendo la información e indicándole desde dónde y cuántas filas.
	// Además le pedimos que nos cuente cuántas filas tenemos.
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT {$inicio}, {$post_por_pagina}"); // Límite desde
    # dónde y cuántas post, por ej., si estamos en la página 2, la variable $inicio sería 3 y nos estaría trayendo los post 3 y 4
    # porque $post_por_pagina nos diría de traer 2 artículos.
    // SQL_CALC_FOUND_ROWS la usamos en la práctica de la paginación (ya explicada).

	$sentencia->execute();
	return $sentencia->fetchAll(); // De esta forma retornamos todos los post en la página.
}

// Función para calcular el número de páginas que tendrá la paginación.
// Return: El número de páginas.
function numero_paginas($post_por_pagina, $conexion){
	//4.- Calculamos el número de filas / artículos que nos devuelve nuestra consulta.
	$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total'); // Estamo llamando con FOUND_ROWS() el cálculo que ya
    # hicimos previamente con SQL_CALC_FOUND_ROWS 
	$total_post->execute();
	$total_post = $total_post->fetch()['total']; // fetch nos devuelve un array y lo que queremos es acceder al índice 'total'.

	//5. Calculamos el número de páginas que habrá en la paginación.
	$numero_paginas = ceil($total_post / $post_por_pagina); // ceil: redondeo al alza.
	return $numero_paginas;
}

// Función para traducir la fecha de formato timestamp a español.
// Return: La fecha en español.
function fecha($fecha){
	$timestamp = strtotime($fecha); // strtotime convierte de una cadena de texto a tiempo.
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp);

	// -1 porque los meses en la función date empiezan desde el 1.
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = $dia . ' de ' . $meses[$mes] . ' del ' . $year;
	return $fecha;
}

// Función para comprobar la session del admin y proteger todas aquellas funciones de la web que corresponden únicamente al admin.
function comprobarSession(){
	// Comprobamos si la session está iniciada.
	if (!isset($_SESSION['admin'])) {
		header('Location: ' . RUTA); // Si el usuario trata de acceder al archivo admin sin serlo entonces
        # redirigimos a la página de inicio.
	}
}

?>