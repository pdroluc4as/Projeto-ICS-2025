<?php

include('conexao.php');

$sql = "SELECT livros.titulo as titulo_do_livro, autor.nome as autor_nome, genero.nome as genero_principal
	FROM livros
	JOIN autor ON livros.autor_id = autor.id
	LEFT JOIN livros_generos ON livros.id = livros_generos.livro_id
	LEFT JOIN genero ON livros_generos.genero_id = genero.id
	GROUP BY livros.id";

$resultado = $conexao->query($sql);

?>
<html>
	<head><title>Livraria</title></head>

	<body>
		<h1>Livros Disponiveis</h1>
		<table>
			<thead border="1">
				<tr>
					<th>Titulo do Livro</th>
					<th>Autor</th>
					<th>Genero</th>
				</tr>
			</thead>
	
			<tbody>
				<?php
				while($linha = $resultado->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $linha['titulo'] . "</td>";
					echo "<td>" . $linha['autor_nome'] . "</td>";
					echo "<td>" . $linha['genero_principal'] . "</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</body>
</html>
