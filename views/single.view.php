<?php require 'header.php' ?> <!-- index.view y single.view son muy similares solo que en single tendré 1 artículo. -->

	<div class="contenedor">
		<section class="post">
			<article>
				<h2 class="titulo"><?php echo $post['titulo'] ?></h2>
				<p class="fecha"><p class="fecha"><?php echo fecha($post['fecha']); ?></p></p>
				<div class="thumb">
					<img src="./imagenes/<?php echo $post['thumb']; ?>" alt="<?php echo $post['titulo'] ?>">
				</div>
				<!-- Con la función nl2br insertamos un salto de línea antes de todas las líneas nuevas de un string. Esto lo hacemos para que nos haga un salto en el texto cuando hagamos salto. Respetaríamos desde la bdd los espacios. Lo que hace es que cuando localiza un espacio le añade un <br al final para que se produzca el espaciado. -->
				<p class="extracto"><?php echo nl2br($post['texto']); ?></p> <!-- Aunque es la clase extracto es el texto, no confundir, lo hacemos porque los estilos se repiten en ambos y utilizamos el mismo. -->
			</article>
		</section>
	</div>

<?php require 'footer.php'; ?>