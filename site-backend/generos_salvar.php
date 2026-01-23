<?php
include('conexao.php');

$id = $_POST['id'];
$nome = $_POST['nome'];

if ($id == "") {
	$sql = "INSERT INTO genero (nome) VALUES('$nome')";

} else {
	$sql = "UPDATE genero SET nome = '$nome' WHERE id = $id";
 }

if ($conexao->query($sql)) {
	header("Location: generos.php");

} else {
	echo "erro ao salvar: " . $conexao->error;
 }

?>
