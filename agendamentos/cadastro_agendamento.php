<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro de Agendamento</title>
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
        <h1>Cadastro de Agendamento</h1>
        <form action="salvar_agendamento.php" method="POST">
            <div class="form-group">
                <label for="id_paciente">Paciente:</label>
                <select class="form-control" name="id_paciente" id="id_paciente" required>
                    <?php
                    // Inclui o ficheiro de conexão com a base de dados
                    include '../conexao.php';
                    
                    // Consulta para buscar todos os pacientes
                    $sql_pacientes = "SELECT id_paciente, nome FROM Paciente ORDER BY nome";
                    $resultado_pacientes = $conexao->query($sql_pacientes);
                    
                    // Verifica se há resultados e exibe as opções
                    if ($resultado_pacientes->num_rows > 0) {
                        while ($row_paciente = $resultado_pacientes->fetch_assoc()) {
                            echo "<option value='" . htmlspecialchars($row_paciente["id_paciente"]) . "'>" . htmlspecialchars($row_paciente["nome"]) . "</option>";
                        }
                    } else {
                        echo "<option value=''>Nenhum paciente cadastrado</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_dentista">Dentista:</label>
                <select class="form-control" name="id_dentista" id="id_dentista" required>
                    <?php
                    // Consulta para buscar todos os dentistas
                    $sql_dentistas = "SELECT id_dentista, nome FROM Dentista ORDER BY nome";
                    $resultado_dentistas = $conexao->query($sql_dentistas);
                    
                    // Verifica se há resultados e exibe as opções
                    if ($resultado_dentistas->num_rows > 0) {
                        while ($row_dentista = $resultado_dentistas->fetch_assoc()) {
                            echo "<option value='" . htmlspecialchars($row_dentista["id_dentista"]) . "'>" . htmlspecialchars($row_dentista["nome"]) . "</option>";
                        }
                    } else {
                        echo "<option value=''>Nenhum dentista cadastrado</option>";
                    }
                    // Fecha a conexão com a base de dados aqui, após ambas as consultas
                    $conexao->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="data_agendamento">Data e Hora:</label>
                <input type="datetime-local" class="form-control" id="data_agendamento" name="data_agendamento" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status" id="status">
                    <option value="Agendado" selected>Agendado</option>
                    <option value="Cancelado">Cancelado</option>
                    <option value="Concluído">Concluído</option>
                </select>
            </div>
            
            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="listar_agendamento.php" class="btn btn-link">Listar Agendamentos</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
