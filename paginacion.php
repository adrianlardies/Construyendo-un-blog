<section class="paginacion"> <!-- Al igual que header la paginación la establecemos en un archivo aparte porque vamos a utilizarla en varias ocasiones repetidamente. -->
	<ul> <!-- Haremos una lista (<ul>) con cada uno de los elementos (<li>)-->
		<?php 
			// Establecemos el número de páginas.
			$numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion); // Debe recibir los parámetros que configuramos en la función en functions.php
		?>
		<!-- Mostramos el botón para retroceder una página. -->
		<?php if (pagina_actual() === 1): ?>
			<li class="disabled">&laquo;</li> <!-- Si estamos en la página 1 el botón de la paginación estará deshabilitado. -->
		<?php else: ?>
			<li><a href="index.php?p=<?php echo pagina_actual() - 1?>">&laquo;</a></li> <!-- Retroceso de una página si no estamos en la página 1. -->
		<?php endif; ?>

		<!-- Creamos un elemento li por cada página que tengamos. -->
		<?php for ($i = 1; $i <= $numero_paginas; $i++): ?>
			<!-- Agregamos la clase active en la página actual. -->
			<?php if (pagina_actual() === $i): ?>
				<li class="active">
					<?php echo $i; ?>
				</li>
			<?php else: ?>
				<li>
					<a href="index.php?p=<?php echo $i?>"><?php echo $i; ?></a>
				</li>
			<?php endif; ?> <!-- Acordarse siempre de poner los finales de ciclo, endif y endfor -->
		<?php endfor; ?>

		<!-- Mostramos el botón para avanzar una página. -->
		<?php if (pagina_actual() == $numero_paginas): ?>
			<li class="disabled">&raquo;</li>
		<?php else: ?>
			<li><a href="index.php?p=<?php echo pagina_actual() + 1; ?>">&raquo;</a></li>
		<?php endif; ?>
	</ul>
</section>