<?php
include('conexao.php');

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$autor_id = $_POST['autor_id'];

// 1. Salva ou Atualiza o LIVRO
if ($id == "") {
    // Inserir Novo
    $sql = "INSERT INTO livros (titulo, descricao, autor_id) VALUES('$titulo', '$descricao', '$autor_id')";
    mysqli_query($conexao, $sql);
    
    // Pega o ID gerado automaticamente
    $livro_id = mysqli_insert_id($conexao);

} else {
    // Atualizar Existente
    $sql = "UPDATE livros SET titulo = '$titulo', descricao = '$descricao', autor_id = '$autor_id' WHERE id = $id";
    mysqli_query($conexao, $sql);
    

    $livro_id = $id; 
}




$sql_limpa = "DELETE FROM livros_generos WHERE livro_id = $livro_id";
mysqli_query($conexao, $sql_limpa);


if (isset($_POST['generos'])) {
    foreach ($_POST['generos'] as $genero_id) {
        $sql_liga = "INSERT INTO livros_generos (livro_id, genero_id) VALUES ('$livro_id', '$genero_id')";
        mysqli_query($conexao, $sql_liga);
    }
}

header("Location: livros.php");
?>
