<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Listagem de Dentistas</title>
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
            max-width: 960px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff; /* Fundo BRANCO para o container principal */
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        h1 {
            color: #007bff; /* Título azul, similar ao do banner */
            margin-bottom: 1.5rem;
            font-weight: bold; /* Título em negrito */
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.25rem; /* Levemente arredondado */
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .table {
            margin-top: 1.5rem;
        }
        /* Adicionado para deixar o fundo das células da tabela branco */
        .table td {
            background-color: white;
        }
        .btn-sm {
            font-size: 0.8rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.2rem;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529; /* Cor do texto para o botão amarelo */
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .ml-1 {
            margin-left: 0.25rem !important; /* Adiciona margem entre os botões de ação */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerenciamento de Dentistas</h1>
        <p><a href="cadastro_dentista.php" class="btn btn-primary">Cadastrar Novo Dentista</a></p>

        <?php
        include '../conexao.php';

        $sql = "SELECT id_dentista, nome, CRO, telefone, email FROM Dentista";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            // Removido 'table-striped' daqui
            echo "<table class='table'>";
            echo "<thead class='thead-light'>"; /* Cabeçalho da tabela mais claro */
            echo "<tr><th>ID</th><th>Nome</th><th>CRO</th><th>Telefone</th><th>Email</th><th>Ações</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_dentista"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["CRO"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td><a href='editar_dentista.php?id=" . $row["id_dentista"] . "' class='btn btn-sm btn-warning'>Editar</a> <a href='excluir_dentista.php?id=" . $row["id_dentista"] . "' class='btn btn-sm btn-danger ml-1'>Excluir</a></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Nenhum dentista cadastrado.</p>";
        }

        $conexao->close();
        ?>

        <div class="mt-3">
            <a href="../index.php" class="btn btn-secondary">Voltar ao início</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>