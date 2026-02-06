<?php
// Adicionei apenas este cabeçalho para garantir que os acentos funcionem
header('Content-Type: text/html; charset=utf-8');

include('conexao.php');
$id = "";
$nome = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Nota: Se a tua tabela no banco se chamar 'autores' (plural), ajusta aqui.
    // Mantive 'autor' como estava no teu código original.
    $sql = "SELECT * FROM autor WHERE id = $id";
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
    <title>Formulário Autor</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6"> <div class="card shadow">
                    
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">
                            <?php echo ($id != "") ? "✏️ Editar Autor" : "➕ Novo Autor";?>
                        </h3>
                    </div>

                    <div class="card-body">
                        
                        <form action="autores_salvar.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <div class="mb-4">
                                <label class="form-label fw-bold">Nome do Autor:</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>" required placeholder="Digite o nome completo do autor">
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="autores.php" class="btn btn-secondary me-2">Cancelar</a>
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