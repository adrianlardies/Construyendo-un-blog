<?php session_start(); // Lo queremos proteger.
require 'config.php';
require '../functions.php';

// Comprobamos si la session está iniciada, sino, redirigimos.
comprobarSession();

// Conectamos a la base de datos.
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

// Comprobamos si los datos han sido enviados.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$titulo = limpiarDatos($_POST['titulo']);
	$extracto = limpiarDatos($_POST['extracto']);
	// Con la función nl2br podemos transformar los saltos de línea en etiquetas <br>
	$texto = $_POST['texto'];
	$thumb = $_FILES['thumb']['tmp_name']; // Acceso a la imagen.

	// Dirección final del archivo incluyendo el nombre cuando esté subido.
	// Importante recordar que este archivo se encuentra dentro de la carpeta admin, asi que tenemos que 
    # concatenar al inicio '../' para bajar a la raíz de nuestro proyecto.
	$archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name']; // Nos quedará algo tipo => ../imagenes/1.png;

	// Subimos el archivo.
	move_uploaded_file($thumb, $archivo_subido); // Con está función estamos moviendo la imagen del pc del usuario a nuestro servidor.

	$statement = $conexion->prepare(
		'INSERT INTO articulos (id, titulo, extracto, texto, thumb) 
		VALUES (null, :titulo, :extracto, :texto, :thumb)' // Usamos placeholders.
	);

	$statement->execute(array(
		':titulo' => $titulo,
		':extracto' => $extracto,
		':texto' => $texto,
		':thumb' => $_FILES['thumb']['name']
	));

	header('Location: ' . RUTA . '/admin');
}


require '../views/nuevo.view.php';

?>