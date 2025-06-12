<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Agendamento Odontológico</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa; /* Fundo bem claro */
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh; /* Garante que o body ocupe a altura total da tela */
            padding-top: 2rem;
        }
        .header-banner {
            background: linear-gradient(to right, #4c6ef5, #645cff); /* Azul com leve gradiente */
            color: white;
            padding: 2rem;
            text-align: center;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header-banner h1 {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            font-weight: bold; /* Coloca o título em negrito */
                }
        .header-banner p {
            font-size: 1rem;
        }
        .navigation-buttons {
            display: flex;
            justify-content: center; /* Centraliza os botões horizontalmente */
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .btn-nav {
            background-color: white;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 2rem;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: bold; /* Coloca o texto em negrito */
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        .btn-nav:hover {
            background-color: #e7f5ff; /* Azul bem claro ao passar o mouse */
            color: #0056b3;
            border-color: #0056b3;
        }
        .container {
            width: 100%;
            max-width: 800px;
            padding: 0 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-banner">
            <h1>Sistema de Agendamento Odontológico</h1>
                <p>Conectando pacientes e dentistas para uma agenda mais eficiente!</p>
        </div>
        <div class="navigation-buttons">
            <a class="btn btn-nav btn-lg" href="pacientes/listar_pacientes.php" role="button">Pacientes</a>
            <a class="btn btn-nav btn-lg" href="agendamentos/listar_agendamento.php" role="button">Agendamentos</a>
            <a class="btn btn-nav btn-lg" href="dentistas/listar_dentistas.php" role="button">Dentistas</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>