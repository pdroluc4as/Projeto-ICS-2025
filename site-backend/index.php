<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Um pequeno ajuste para os cartões ficarem com sombra ao passar o mouse */
        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2) !important;
        }
    </style>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">📚 Sistema Livraria</a>
            <span class="navbar-text text-white">
                Painel Admin
            </span>
        </div>
    </nav>

    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-dark">Bem-vindo ao Painel</h1>
            <p class="lead text-secondary">Selecione uma opção abaixo para gerenciar o sistema.</p>
        </div>

        <div class="row g-4">
            
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 text-center">
                    <div class="card-body py-5">
                        <div class="display-1 mb-3">✍️</div> <h3 class="card-title">Autores</h3>
                        <p class="card-text text-muted">Cadastrar, editar e listar autores.</p>
                        <a href="autores.php" class="btn btn-primary btn-lg w-100 stretched-link">Gerenciar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 text-center">
                    <div class="card-body py-5">
                        <div class="display-1 mb-3">🏷️</div>
                        <h3 class="card-title">Gêneros</h3>
                        <p class="card-text text-muted">Categorias e estilos literários.</p>
                        <a href="generos.php" class="btn btn-warning btn-lg w-100 text-white stretched-link">Gerenciar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 text-center">
                    <div class="card-body py-5">
                        <div class="display-1 mb-3">📖</div>
                        <h3 class="card-title">Livros</h3>
                        <p class="card-text text-muted">Acervo principal da biblioteca.</p>
                        <a href="livros.php" class="btn btn-success btn-lg w-100 stretched-link">Gerenciar</a>
                    </div>
                </div>
            </div>

        </div> <footer class="mt-5 pt-4 text-center text-muted border-top">
            <p>&copy; 2025 Sistema de Livraria - Versão 1.0</p>
        </footer>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>