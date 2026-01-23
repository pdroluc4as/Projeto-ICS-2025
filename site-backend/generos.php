<?php
include('conexao.php');
?>

<html>
	<head><title>Gerenciar generos</title></head>

	<body>
		<h1>Lista de generos</h1>

		<a href="generos_form.php">Novo Genero</a>
		<a href="index.php">Voltar ao menu</a>

		<table>
			<thead>
				<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>ações</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM genero";
				$resultado = $conexao->query($sql);

				while($row = $resultado->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['nome'] . "</td>";
					echo "<td>";
					echo "<a href='generos_form.php?id=" . $row['id']. "' >Editar</a>";

					echo "<a href='generos_excluir.php?id=" . $row['id'] . "'onclick='return confirm(\"tem certeza?\")'>Excluir</a>";
					echo "</td>";
					echo "</tr>";
				}

				?>
			</tbody>
		</table>

	</body>
</html>
