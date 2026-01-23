<?php
include('conexao.php');

$id = $_POST['id'];
$nome = $_POST['nome'];

if ($id == "") {
	$sql = "INSERT INTO autor (nome) VALUES('$nome')";

} else {
	$sql = "UPDATE autor SET nome = '$nome' WHERE id = $id";
 }

if ($conexao->query($sql)) {
	header("Location: autores.php");

} else {
	echo "erro ao salvar: " . $conexao->error;
 }

?>
