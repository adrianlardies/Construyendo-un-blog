<?php // Podríamos hacer un archivo de la vista del error pero como son pocas líneas en este proyecto lo integramos todo dentro de este mismo archivo, en proyectos más grandes es conveniente separarlo al igual que hemos hecho con el index y single.
require 'admin/config.php';
require 'views/header.php';
?>

<div class="contenedor">
	<div class="post">
		<article>
			<h2 class="titulo">Error</h2>
			<br>
			<p class="extracto">Error de conexión</p>
		</article>
	</div>
</div>

<?php require 'views/footer.php'; ?>