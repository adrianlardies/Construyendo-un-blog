<?php require 'header.php'; ?>

	<div class="contenedor">
		<div class="post">
			<article>
				<h2 class="titulo">Editar artículo</h2>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" enctype="multipart/form-data" method="post">
					<input type="hidden" name="id" value="<?php echo $post['id']; ?>"> <!-- Nos sirve para decir el id del artículo
                    que estamos trabajando. -->
					<input type="text" name="titulo" value="<?php echo $post['titulo'] ?>">
					<input type="text" name="extracto" value="<?php echo $post['extracto']; ?>">
					<textarea name="texto"><?php echo $post['texto']; ?></textarea>
					<input type="file" name="thumb">
					<input type="hidden" name="thumb-guardada" value="<?php echo $post['thumb']; ?>"> <!-- hidden no se muestra en pantalla.
                    Se encarga de guardar el valor del thumb que tengamos en la bdd, porque al editar podemos cargar una nueva imagen o no,
                    entonces si subimos una nueva imagen se sube la thumb nueva a la base de datos y sino se quedará con la thumb que ya
                    se tenía guardada en la bdd y no va a hacer ningún cambio en esa columna. -->

					<input type="submit" value="Guardar datos">
				</form>
			</article>
		</div>
	</div>

<?php require 'footer.php'; ?>