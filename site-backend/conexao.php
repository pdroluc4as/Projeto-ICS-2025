<?php
// configurações do banco
$host = "192.168.100.20"; // IP da VM do  banco
$usuario = "admin_livraria";
$senha = "senha123";
$banco = "livraria";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_errno) {
	echo "Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error;
	exit;
}


mysqli_set_charset($conexao, "utf8mb4");
?>
