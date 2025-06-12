<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Listagem de Pacientes</title>
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
        /* Removido .ml-1 ou ajustado para ser um gap pequeno */
        .actions-cell {
            display: flex;
            gap: 0.5rem; /* Adiciona um pequeno espaço entre os botões */
            justify-content: flex-start; /* Alinha os botões à esquerda da célula */
            align-items: center; /* Centraliza verticalmente */
        }

        /* Estilo do Modal Personalizado */
        .modal-content-custom {
            border-radius: 15px; /* Bordas mais arredondadas */
            box-shadow: 0 5px 15px rgba(0,0,0,.5); /* Sombra mais forte */
            background-color: #fff;
            padding: 20px;
        }
        .modal-header-custom {
            border-bottom: none;
            padding: 1rem 1rem 0;
            text-align: center;
        }
        .modal-title-custom {
            width: 100%;
            font-weight: bold;
            color: #007bff; /* Título do modal azul */
        }
        .modal-body-custom {
            text-align: center;
            font-size: 1.1rem;
            padding: 1rem;
        }
        .modal-footer-custom {
            border-top: none;
            padding: 0 1rem 1rem;
            text-align: center; /* Centraliza o botão OK */
            display: block; /* Para alinhar o botão */
        }
        .btn-modal-ok {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.5rem; /* Botão OK mais arredondado */
            padding: 0.5rem 1.5rem;
            font-weight: bold;
        }
        .btn-modal-ok:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerenciamento de Pacientes</h1>
        <p><a href="cadastro_paciente.html" class="btn btn-primary">Cadastrar Novo Paciente</a></p>

        <?php
        include '../conexao.php';

        $sql = "SELECT id_paciente, nome, CPF, telefone, email, DATE_FORMAT(data_nascimento, '%d/%m/%Y') AS data_nascimento_formatada FROM Paciente";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<table class='table'>";
            echo "<thead class='thead-light'>";
            echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>Telefone</th><th>Email</th><th>Data de Nascimento</th><th>Ações</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["id_paciente"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["CPF"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["telefone"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["data_nascimento_formatada"]) . "</td>";
                // AQUI ESTÁ A ALTERAÇÃO: Usando a nova classe 'actions-cell' para os botões
                echo "<td class='actions-cell'>";
                echo "<a href='editar_paciente.php?id=" . htmlspecialchars($row["id_paciente"]) . "' class='btn btn-sm btn-warning'>Editar</a>";
                echo "<a href='excluir_paciente.php?id=" . htmlspecialchars($row["id_paciente"]) . "' class='btn btn-sm btn-danger'>Excluir</a>"; // Removido ml-1
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Nenhum paciente cadastrado.</p>";
        }

        $conexao->close();
        ?>

        <div class="mt-3">
            <a href="../index.php" class="btn btn-secondary">Voltar ao início</a>
        </div>
    </div>

    <!-- Alerta Customizado -->
    <div class="modal fade" id="customAlertDialog" tabindex="-1" role="dialog" aria-labelledby="customAlertDialogLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-custom">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title modal-title-custom" id="customAlertDialogLabel">Mensagem do Sistema</h5>
                </div>
                <div class="modal-body modal-body-custom" id="customAlertMessage">
                    <!-- A mensagem será inserida aqui -->
                </div>
                <div class="modal-footer modal-footer-custom">
                    <button type="button" class="btn btn-primary btn-modal-ok" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Função para obter parâmetros da URL
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        };

        $(document).ready(function() {
            var status = getUrlParameter('status');
            var message = getUrlParameter('message');

            if (status && message) {
                // Configura a mensagem e exibe o modal
                $('#customAlertMessage').text(message);
                $('#customAlertDialog').modal('show');

                // Opcional: Remover os parâmetros da URL após exibir o modal
                history.replaceState({}, document.title, window.location.pathname);
            }
        });
    </script>
</body>
</html>
