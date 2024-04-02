<?php session_start();

session_destroy();
$_SESSION = array(); // Al indicar que es un array en blanco lo estamos reinciando.

header('Location: ../');
die();

?>