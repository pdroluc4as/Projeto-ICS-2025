<?php
// Garante que o navegador entenda os acentos
header('Content-Type: text/html; charset=utf-8');

include('conexao.php');
$id = "";
$nome = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // A query mantém o singular 'genero' conforme o teu código original
    $sql = "SELECT * FROM genero WHERE id = $id";
    $resultado = $conexao->query($sql);
    $row = $resultado->fetch_assoc();
    $nome = $row['nome'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Gênero</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6"> <div class="card shadow">
                    
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">
                            <?php echo ($id != "") ? "✏️ Editar Gênero" : "➕ Novo Gênero";?>
                        </h3>
                    </div>

                    <div class="card-body">
                        
                        <form action="generos_salvar.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <div class="mb-4">
                                <label class="form-label fw-bold">Nome do Gênero:</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>" required placeholder="Ex: Ficção Científica">
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="generos.php" class="btn btn-secondary me-2">Cancelar</a>
                                
                                <button type="submit" class="btn btn-success">Salvar</button>
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