<?php session_start();
require 'config.php';
require '../functions.php';

// 1.- Conectamos a la base de datos.
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

comprobarSession();

// Determinamos si se están enviando los datos por el método POST o GET.
// Si se envían por POST significa que el usuario los ha enviado desde el formulario.
// Por lo que tomamos los datos y los cambiamos en la base de datos.

// De otra forma significa que hay datos enviados por el método GET.
// Es decir, el id que pasamos por la URL, si es así entonces traemos los
# datos de la base de datos a pantalla para que el usuario los pueda modificar.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Limpiamos los datos para evitar que el usuario inyecte código.
	$titulo = limpiarDatos($_POST['titulo']);
	$extracto = limpiarDatos($_POST['extracto']);
	// Con la función nl2br podemos transformar los saltos de línea en etiquetas <br>
	// $texto = nl2br($_POST['texto']);
	$texto = $_POST['texto']; // Aquí si queremos permitir código html.
	$id = limpiarDatos($_POST['id']);
	$thumb_guardada = $_POST['thumb-guardada'];
	$thumb = $_FILES['thumb'];

	// Comprobamos que el nombre del thumb no este vacío, si lo está
	# significa que el usuario no agregó una nueva thumb, es decir, no subió una nueva imagen, y entonces utilizamos la thumb anterior.
	if (empty($thumb['name'])) {
		$thumb = $thumb_guardada;
	} else {
		// De otra forma cargamos la nueva thumb.
		// Dirección final del archivo incluyendo el nombre
		// Importante recordar que este archivo se encuentra dentro de la carpeta admin, asi que
		# tenemos que concatenar al inicio '../' para bajar a la raíz de nuestro proyecto.
		$archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];

		move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido); // Con esta función subimos el archivo del pc del usuario al servidor.
		$thumb = $_FILES['thumb']['name'];

	}

	$statement = $conexion->prepare('UPDATE articulos SET titulo = :titulo, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id');
	$statement->execute(array(
		':titulo' => $titulo,
		':extracto' => $extracto,
		':texto' => $texto,
		':thumb' => $thumb,
		':id' => $id
	)); // Subimos todos los datos previos a nuestra bdd.
 
	header("Location: " . RUTA . '/admin');
} else {
	$id_articulo = id_articulo($_GET['id']); // Obtiene el artículo de la página y lo limpia.

	if (empty($id_articulo)) {
		header('Location: ' . RUTA . '/admin');
	}

	// Obtenemos el post por id.
	$post = obtener_post_por_id($conexion, $id_articulo);

	// Si no hay post en el id entonces redirigimos.
	if (!$post) {
		header('Location: ' . RUTA . '/admin/index.php');
	}
	$post = $post[0]; // Porque $post es un array en un array. lo vemos fácil si hacemos print_r($post);
}

require '../views/editar.view.php';

?>