<?php
include('conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM autor WHERE id = $id";

if ($conexao->query($sql)) {

	header("Location: autores.php");
} else {
	echo "Errp ap excluir autor(pode ser que esse autor tenha livros vinculados): " . $conexao->error;
 }

?>
