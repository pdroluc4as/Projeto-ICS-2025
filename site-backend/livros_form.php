<?php
// Garante UTF-8 para acentos e emojis
header('Content-Type: text/html; charset=utf-8');

include('conexao.php');
$id = "";
$titulo = "";
$autor_id = "";
$descricao = "";
$generos_do_livro = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM livros WHERE id = $id";
    $resultado = $conexao->query($sql);
    $row = $resultado->fetch_assoc();
    $titulo = $row['titulo'];
    $autor_id = $row['autor_id'];
    $descricao = $row['descricao'];

    $sql_genero_livro = "SELECT genero_id FROM livros_generos WHERE livro_id = $id";
    $res_genero = mysqli_query($conexao, $sql_genero_livro);

    while($g = mysqli_fetch_assoc($res_genero)) {
        $generos_do_livro[] = $g['genero_id'];
    }
}

$lista_autores = mysqli_query($conexao, "SELECT * FROM autor"); // (ou autores)
$lista_generos = mysqli_query($conexao, "SELECT * FROM genero"); // (ou generos)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário do Livro</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8"> <div class="card shadow">
                    
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">
                            <?php echo ($id != "") ? "✏️ Editar Livro" : "📚 Novo Livro";?>
                        </h3>
                    </div>

                    <div class="card-body">
                        
                        <form action="livros_salvar.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <div class="mb-3">
                                <label class="form-label fw-bold">Título do Livro:</label>
                                <input type="text" name="titulo" class="form-control" value="<?php echo $titulo; ?>" required placeholder="Digite o título completo">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Descrição / Sinopse:</label>
                                <textarea name="descricao" class="form-control" rows="4" required placeholder="Escreva um resumo do livro..."><?php echo $descricao;?></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Autor:</label>
                                <select name="autor_id" class="form-select" required>
                                    <option value="">Selecione um autor...</option>
                                    <?php
                                    // Loop mantido exatamente como pediste
                                    if(mysqli_num_rows($lista_autores) > 0){
                                        while($autor = mysqli_fetch_assoc($lista_autores)) {
                                            $selecionado = ($autor['id'] == $autor_id) ? "selected" : "";
                                            echo "<option value='" . $autor['id'] . "' $selecionado>" . $autor['nome'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold d-block">Gêneros Literários:</label>
                                
                                <div class="card p-3 bg-light border-0">
                                    <div class="row">
                                        <?php
                                        if (mysqli_num_rows($lista_generos) > 0) {
                                            while($genero = mysqli_fetch_assoc($lista_generos)) {
                                                $gid = $genero['id'];
                                                
                                                // Verifica se existe coluna descricao ou nome
                                                $gnome = isset($genero['descricao']) ? $genero['descricao'] : $genero['nome'];

                                                $checked = in_array($gid, $generos_do_livro) ? "checked" : "";
                                                
                                                // Estrutura de Checkbox do Bootstrap (Colunas de 4 para ficar organizado)
                                                echo "<div class='col-md-4 mb-2'>";
                                                echo "<div class='form-check'>";
                                                echo "<input class='form-check-input' type='checkbox' name='generos[]' value='$gid' id='g_$gid' $checked>";
                                                echo "<label class='form-check-label' for='g_$gid'> $gnome</label>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                        } else {
                                            echo "<p class='text-danger'>Nenhum gênero encontrado. Cadastre gêneros primeiro!</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end border-top pt-3">
                                <a href="livros.php" class="btn btn-secondary me-2">Cancelar</a>
                                <button type="submit" class="btn btn-success px-4">Salvar Livro</button>
                            </div>
                            
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>