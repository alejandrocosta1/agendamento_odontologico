<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar Dentista</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa; /* Fundo cinza bem claro para o body */
            margin: 0;
            padding-top: 2rem;
        }
        .container {
            max-width: 600px; /* Largura ajustada para formulários */
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff; /* Fundo BRANCO para o container principal */
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05); /* Sombra suave para o card do formulário */
        }
        h1 {
            color: #007bff; /* Título azul e em negrito */
            margin-bottom: 1.5rem;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.25rem;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-link {
            padding-right: 0;
            padding-left: 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Dentista</h1>

        <?php
        include '../conexao.php';

        if (isset($_GET["id"])) {
            $id = htmlspecialchars($_GET["id"]); // Sanitiza o ID da URL
            $sql = "SELECT id_dentista, nome, CRO, telefone, email FROM Dentista WHERE id_dentista = ?";
            $stmt = $conexao->prepare($sql);
            
            if ($stmt === false) {
                echo "<p class='alert alert-danger'>Erro ao preparar a consulta de dentista: " . htmlspecialchars($conexao->error) . "</p>";
            } else {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($resultado->num_rows == 1) {
                    $dentista = $resultado->fetch_assoc();
                    ?>
                    <form action="atualizar_dentista.php" method="POST">
                        <input type="hidden" name="id_dentista" value="<?php echo htmlspecialchars($dentista['id_dentista']); ?>">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($dentista['nome']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cro">CRO:</label>
                            <input type="text" class="form-control" id="cro" name="cro" value="<?php echo htmlspecialchars($dentista['CRO']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo htmlspecialchars($dentista['telefone']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($dentista['email']); ?>">
                        </div>
                        
                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <a href="listar_dentistas.php" class="btn btn-link">Voltar para a Listagem</a>
                        </div>
                    </form>
                    <?php
                } else {
                    echo "<p class='alert alert-warning'>Dentista não encontrado.</p>";
                }
                $stmt->close();
            }
            $conexao->close(); // Fecha a conexão após todas as operações
        } else {
            echo "<p class='alert alert-danger'>ID do dentista não especificado.</p>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
