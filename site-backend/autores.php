<?php
include('conexao.php');
?>

<html>
	<head><title>Gerenciar autores</title></head>

	<body>
		<h1>Lista de autores</h1>

		<a href="autores_form.php">Novo Autor</a>
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
				$sql = "SELECT * FROM autor";
				$resultado = $conexao->query($sql);

				while($row = $resultado->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['nome'] . "</td>";
					echo "<td>";
					echo "<a href='autores_form.php?id=" . $row['id']. "' >Editar</a>";

					echo "<a href='autores_excluir.php?id=" . $row['id'] . "'onclick='return confirm(\"tem certeza?\")'>Excluir</a>";
					echo "</td>";
					echo "</tr>";
				}

				?>
			</tbody>
		</table>

	</body>
</html>
