<?php // Aquí guardamos la configuración de nuestra web como los artículos que queremos cargar, la contraseña y el usuario del login.
# Lo podríamos guardar en una bdd pero como es un proyecto sencillo lo hacemos así.

define('RUTA', 'http://localhost/curso_php/practicas/blog'); // Definimos la 'RUTA' con la dirección de nuestro blog.


$bd_config = array(
	'basedatos' => 'blog_practica',
	'usuario' => 'root',
	'pass' => ''
);

$blog_config = array(
	'post_por_pagina'=> '2',
	'carpeta_imagenes' => 'imagenes/' // Si alguna vez la cambiamos importante cambiarla.
);

$blog_admin = array( // Aquí es donde podriamos combinar la práctica de los formularios de login e inicio de sesión y
    # combinarla con esta, añadiendo estos datos en una bdd.
	'usuario' => 'Adrián',
	'password' => '123'
);

?>