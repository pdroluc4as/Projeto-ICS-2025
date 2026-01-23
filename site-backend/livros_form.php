<?php
include('conexao.php');
$id = "";
$titulo = "";
$autor_id = "";
$generos_do_livro = [];

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM livros WHERE id = $id";
	$resultado = $conexao->query($sql);
	$row = $resultado->fetch_assoc();
	$titulo = $row['titulo'];
	$autor_id = $row['autor_id'];
	

	$sql_genero_livro = "SELECT genero_id FROM livros_generos WHERE livro_id = $id";
	$res_genero = mysqli_query($conexao, $sql_genero_livro);

	while($g = mysqli_fetch_assoc($res_genero)) {
		$generos_do_livro[] = $g['genero_id'];
	}
}

$lista_autores = mysqli_query($conexao, "SELECT * FROM autor");
$lista_generos = mysqli_query($conexao, "SELECT * FROM genero");


?>


<html>
	<head><title>Formulario do livro</title></head>
	<p><?php $lista_generos ?> </p>
	<body>
		<h2><?php echo ($id != "") ? "Editar livro" : "Novo livro";?></h2>

		<form action="livros_salvar.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<div>
				<label>titulo do livro:</label>
				<input type="text" name="titulo" value="<?php echo $titulo; ?>" required>
			</div>

			<div>
				<label>Autor:</label>
				<select name="autor_id" required>
				<option value="">Selecione um autor...</option>
				<?php 
				while($autor['id'] = $conexao->fetch_assoc($lista_autores)) {
					$selecionado = ($autor['id'] == $autor_id) ? "selected" : "";
					echo "<option value='" . $autor['id'] . "' $selecionado>" . $autor['nome'] . "</option>";
				}
				?>
			</div>
			<div>
				<?php
				while($genero = mysqli_fetch_assoc($lista_generos)) {
					$gid = $genero['id'];
					$gnome = $genero['nome'];

					$checked = in_array($gid, $generos_do_livro) ? "checked" : "";
					echo "<div>";
					echo "<input type='checkbox' name='generos[]' value='$gid' id='g_$gid' $checked>";
					echo "<label for='g_$gid'>$gnome</label>";
					echo "</div>";
				}
				?>
			</div>
			<button type="submit">Salvar</button>
			<a href="livros.php">Cancelar</a>>
		</form>
	</body>

</html>
