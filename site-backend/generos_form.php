<?php
include('conexao.php');
$id = "";
$nome = "";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM genero WHERE id = $id";
	$resultado = $conexao->query($sql);
	$row = $resultado->fetch_assoc();
	$nome = $row['nome'];
}

?>


<html>
	<head><title>Formulario atuor</title></head>

	<body>
		<h2><?php echo ($id != "") ? "Editar genero" : "Novo genero";?></h2>

		<form action="generos_salvar.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<div>
				<label>Nome do Genero:</label>
				<input type="text" name="nome" value="<?php echo $nome; ?>" required>
			</div>

			<button type="submit">Salvar</button>
			<a href="genero.php">Cancelar</a>
		</form>
	</body>

</html>
