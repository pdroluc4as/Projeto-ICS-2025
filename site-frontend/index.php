<?php
include('conexao.php');

// SQL ajustada para trazer os gêneros agrupados e evitar erros
$sql = "SELECT 
            livros.titulo as titulo_do_livro, 
            autor.nome as autor_nome, 
            IFNULL(GROUP_CONCAT(genero.nome SEPARATOR ', '), 'Sem Gênero') as lista_generos
        FROM livros
        JOIN autor ON livros.autor_id = autor.id
        LEFT JOIN livros_generos ON livros.id = livros_generos.livro_id
        LEFT JOIN genero ON livros_generos.genero_id = genero.id
        GROUP BY livros.id";

// Executa a query no estilo procedural (compatível com teu conexao.php)
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Livraria - Lista de Livros</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light"> <div class="container mt-5">
        
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0 text-center">📚 Livros Disponíveis</h2>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Título do Livro</th>
                                <th>Autor</th>
                                <th>Gêneros</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Loop no estilo procedural
                            while($linha = mysqli_fetch_assoc($resultado)) {
                                echo "<tr>";
                                echo "<td class='fw-bold'>" . $linha['titulo_do_livro'] . "</td>";
                                echo "<td>" . $linha['autor_nome'] . "</td>";
                                
                                // Badge (etiqueta) para os gêneros ficarem bonitos
                                echo "<td><span class='badge bg-secondary'>" . $linha['lista_generos'] . "</span></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
