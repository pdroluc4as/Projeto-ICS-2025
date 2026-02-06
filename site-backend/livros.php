<?php
// Garante o envio correto dos caracteres (acentos)
header('Content-Type: text/html; charset=utf-8');

include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Livros</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        
        <div class="card shadow-sm">
            
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0">📖 Lista de Livros</h3>
                
                <a href="index.php" class="btn btn-outline-light btn-sm">
                    ⬅ Voltar ao Menu
                </a>
            </div>

            <div class="card-body">
                
                <div class="mb-3 text-end">
                    <a href="livros_form.php" class="btn btn-success">
                        + Novo Livro
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 20%;">Título</th>
                                <th style="width: 15%;">Autor</th>
                                <th>Descrição</th>
                                <th style="width: 15%;">Gêneros</th>
                                <th style="width: 15%; text-align: center;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // A tua consulta SQL original (INTACTA)
                            $sql = "SELECT 
                                        livros.id, 
                                        livros.titulo, 
                                        livros.descricao, 
                                        autor.nome AS nome_autor, 
                                        -- Se for NULL, mostra 'Nenhum gênero vinculado'
                                        IFNULL(GROUP_CONCAT(genero.nome SEPARATOR ', '), 'Nenhum gênero vinculado') AS lista_generos
                                    FROM livros
                                    JOIN autor ON livros.autor_id = autor.id
                                    LEFT JOIN livros_generos ON livros.id = livros_generos.livro_id
                                    LEFT JOIN genero ON livros_generos.genero_id = genero.id
                                    GROUP BY livros.id;";
                            
                            // Execução no modo procedural (compatível com teu conexao.php)
                            $resultado = mysqli_query($conexao, $sql);

                            if(mysqli_num_rows($resultado) > 0){
                                while($row = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    
                                    // Título em negrito
                                    echo "<td class='fw-bold'>" . $row['titulo'] . "</td>";
                                    
                                    echo "<td>" . $row['nome_autor'] . "</td>";
                                    
                                    // Descrição com texto menor para não ocupar muito espaço
                                    echo "<td class='text-muted small'>" . $row['descricao'] . "</td>";
                                    
                                    // Gêneros dentro de uma etiqueta azul
                                    $generos = $row['lista_generos'];
                                    echo "<td><span class='badge bg-info text-dark'>" . $generos . "</span></td>";
                                    
                                    // Ações (Botões)
                                    echo "<td class='text-center'>";
                                    
                                    echo "<a href='livros_form.php?id=" . $row['id']. "' class='btn btn-warning btn-sm me-2'>Editar</a>";

                                    echo "<a href='livros_excluir.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir este livro?\")'>Excluir</a>";
                                    
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center text-muted py-3'>Nenhum livro encontrado.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div> </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>