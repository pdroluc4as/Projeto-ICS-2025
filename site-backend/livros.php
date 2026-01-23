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
				<th>Genero</th>
				<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM livros";
				$resultado = $conexao->query($sql);

				while($row = $resultado->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['titulo'] . "</td>";
					echo "<td>" . $row['autor'] . "</td>";
					echo "<td>" . $row['genero'] . "</td>";
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
