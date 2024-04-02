<?php require 'header.php' ?> <!-- Primero cargamos toda la estructura del header, la hemos separado del index.view 
donde estaba originalmente porque es una estructura que vamos a repetir en varios archivos. -->

	<div class="contenedor">
		<?php foreach($posts as $post): ?> <!-- Agregamos una clase post por cada uno de los artículos que tenemos. -->
			<div class="post">
				<article>
					<h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo'] ?></a></h2> <!-- Carga
					dinámica del artículo desde la bdd. -->
					<p class="fecha"><?php echo fecha($post['fecha']); ?></p> <!-- Carga dinámica de la fecha. -->
					<div class="thumb">
						<a href="single.php?id=<?php echo $post['id']; ?>">
							<img src="./imagenes/<?php echo $post['thumb']; ?>" alt="<?php echo $post['titulo'] ?>">
						</a>
					</div>
					<p class="extracto"><?php echo $post['extracto'] ?></p>
					<a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Continuar leyendo</a>
				</article>
			</div>
		<?php endforeach; ?>

		<?php require 'paginacion.php'; ?>

	</div>

<?php require 'footer.php'; ?> <!-- También se repite en varias páginas. -->