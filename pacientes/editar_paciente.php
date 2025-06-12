<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar Paciente</title>
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
        <h1>Editar Paciente</h1>

        <?php
        include '../conexao.php';

        if (isset($_GET["id"])) {
            $id = htmlspecialchars($_GET["id"]); // Sanitiza o ID da URL
            $sql = "SELECT id_paciente, nome, CPF, telefone, email, data_nascimento FROM Paciente WHERE id_paciente = ?";
            $stmt = $conexao->prepare($sql);
            
            if ($stmt === false) {
                echo "<p class='alert alert-danger'>Erro ao preparar a consulta de paciente: " . htmlspecialchars($conexao->error) . "</p>";
            } else {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($resultado->num_rows == 1) {
                    $paciente = $resultado->fetch_assoc();
                    ?>
                    <form action="atualizar_paciente.php" method="POST">
                        <input type="hidden" name="id_paciente" value="<?php echo htmlspecialchars($paciente['id_paciente']); ?>">

                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($paciente['nome']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($paciente['CPF']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo htmlspecialchars($paciente['telefone']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($paciente['email']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($paciente['data_nascimento']); ?>">
                        </div>
                        
                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <a href="listar_pacientes.php" class="btn btn-link">Voltar para a Listagem</a>
                        </div>
                    </form>
                    <?php
                } else {
                    echo "<p class='alert alert-warning'>Paciente não encontrado.</p>";
                }
                $stmt->close();
            }
            $conexao->close(); // Fecha a conexão após todas as operações
        } else {
            echo "<p class='alert alert-danger'>ID do paciente não especificado.</p>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
