<?php
include('conexao.php');
?>

<html>
	<head><title>Gerenciar Livros</title></head>

	<body>
		<h1>Lista de livros</h1>

		<a href="livros_form.php">Novo Livro</a>
		<a href="index.php">Voltar ao menu</a>

		<table>
			<thead>
				<tr>
				<th>ID</th>
				<th>Titulo</th>
				<th>Autor</th>
				<th>Descrição</th>
				<th>Genero</th>
				<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT 
    livros.id, 
    livros.titulo, 
    livros.descricao, 
    autor.nome AS nome_autor, 
    -- Se for NULL, mostra 'Nenhum gênero vinculado'
    IFNULL(GROUP_CONCAT(genero.nome SEPARATOR ', '), 'Nenhum gênero vinculado') AS lista_generos
FROM livros
JOIN autor ON livros.autor_id = autor.id
LEFT JOIN livros_generos ON livros.id = livros_generos.livro_id
LEFT JOIN genero ON livros_generos.genero_id = genero.id
GROUP BY livros.id;";
				$resultado = $conexao->query($sql);

				while($row = $resultado->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['titulo'] . "</td>";
					echo "<td>" . $row['nome_autor'] . "</td>";
					echo "<td>" . $row['descricao'] . "</td>";
					$generos = $row['lista_generos'];
            				echo "<td>" . $generos . "</td>";
					echo "<td>";
					echo "<a href='livros_form.php?id=" . $row['id']. "' >Editar</a>";

					echo "<a href='livros_excluir.php?id=" . $row['id'] . "'onclick='return confirm(\"tem certeza?\")'>Excluir</a>";
					echo "</td>";
					echo "</tr>";
				}

				?>
			</tbody>
		</table>

	</body>
</html>
