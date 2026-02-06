<?php
include('conexao.php');


if(isset($_GET['id'])) {
    
    
    $id = (int)$_GET['id'];

    
    $sql_limpa_generos = "DELETE FROM livros_generos WHERE livro_id = $id";
    $resultado_generos = mysqli_query($conexao, $sql_limpa_generos);

    
    if($resultado_generos) {
        $sql_livro = "DELETE FROM livros WHERE id = $id";
        mysqli_query($conexao, $sql_livro);
    }
}


header("Location: livros.php");
exit;
?>