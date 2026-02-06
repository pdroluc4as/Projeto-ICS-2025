<?php

header('Content-Type: text/html; charset=utf-8');

include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Gêneros</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        
        <div class="card shadow-sm">
            
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0">🏷️ Lista de Gêneros</h3>
                
                <a href="index.php" class="btn btn-outline-light btn-sm">
                    ⬅ Voltar ao Menu
                </a>
            </div>

            <div class="card-body">
                
                <div class="mb-3 text-end">
                    <a href="generos_form.php" class="btn btn-success">
                        + Novo Gênero
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 10%;">ID</th>
                                <th>Nome do Gênero</th>
                                <th style="width: 20%; text-align: center;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $sql = "SELECT * FROM genero";
                            
                            
                            $resultado = mysqli_query($conexao, $sql);

                            if(mysqli_num_rows($resultado) > 0){
                                while($row = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    
                                    // Destaque no nome
                                    echo "<td class='fw-bold'>" . $row['nome'] . "</td>";
                                    
                                    echo "<td class='text-center'>";
                                    
                                    // Botão Editar (Amarelo)
                                    echo "<a href='generos_form.php?id=" . $row['id']. "' class='btn btn-warning btn-sm me-2'>Editar</a>";

                                    // Botão Excluir (Vermelho)
                                    echo "<a href='generos_excluir.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir este gênero?\")'>Excluir</a>";
                                    
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3' class='text-center text-muted py-3'>Nenhum gênero cadastrado.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>