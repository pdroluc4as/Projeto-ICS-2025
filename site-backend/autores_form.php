<?php
include('conexao.php');
$id = "";
$nome = "";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM autor WHERE id = $id";
	$resultado = $conexao->query($sql);
	$row = $resultado->fetch_assoc();
	$nome = $row['nome'];
}

?>


<html>
	<head><title>Formulario atuor</title></head>

	<body>
		<h2><?php echo ($id != "") ? "Editar autor" : "Novo autor";?></h2>

		<form action="autores_salvar.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<div>
				<label>Nome do Autor:</label>
				<input type="text" name="nome" value="<?php echo $nome; ?>" required>
			</div>

			<button type="submit">Salvar</button>
			<a href="autores.php">Cancelar</a>
		</form>
	</body>

</html>
