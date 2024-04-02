<?php require 'header.php' ?>

	<div class="contenedor">
		<div class="post">
			<article>
				<h2 class="titulo">Nuevo artículo</h2>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" class="formulario" method="post">
				<!-- En el formulario queremos subir archivos por lo que es fundamental el enctype="multipart/form-data"-->
                    <input type="text" name="titulo" placeholder="Título del artículo">
					<input type="text" name="extracto" placeholder="Extracto del artículo">
					<textarea name="texto" placeholder="Texto del artículo"></textarea>
					<input type="file" name="thumb">

					<input type="submit" value="Crear artículo">
				</form>
			</article>
		</div>
	</div>

<?php require 'footer.php'; ?>