<?php
include('conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM genero WHERE id = $id";

if ($conexao->query($sql)) {

	header("Location: generos.php");
} else {
	echo "Errp ap excluir genero: " . $conexao->error;
 }

?>
