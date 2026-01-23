<?php
include('conexao.php');

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor_id = $_POST['autor_id']

if ($id == "") {
	$sql = "INSERT INTO livros (titulo, autor_id) VALUES('$titulo', '$autor_id')";
	
	mysqli_query($conexao, $sql);
	$livro_id = mysqli_insert_id($conexao);

} else {
	$sql = "UPDATE genero SET titulo = '$titulo', autor_id = '$autor_id' WHERE id = $id";
	
	mysqli_query($conexao, $sql);
	$livro_id = mysqli_insert_id($conexao);
 }

$sql_limpa = "DELETE FROM livros_generos WHERE livro_id = $livro_id";
mysqli_query($conexao, $sql_limpa);

if (isset($_POST['generos'])) {
	foreach ($_POST['genero'] as $genero_id) {
		$sql_liga = "INSERT INTO livros_generos (livro_id, genero_id) VALUES ('$livro_id', '$genero_id')";
		mysqli_query($conexao, $sql_liga);
	}
}


header("Location: livros.php");

?>
