<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro de Dentista</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding-top: 2rem;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        h1 {
            color: #007bff;
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
        <h1>Cadastro de Dentista</h1>
        <form action="salvar_dentista.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="cro">CRO:</label>
                <input type="text" class="form-control" id="cro" name="cro" placeholder="UF000000" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            
            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="listar_dentistas.php" class="btn btn-link">Listar Dentistas</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function(){
            // Máscara para CRO: duas letras (UF) e 6 dígitos
            // 'S' = caracteres alfanuméricos, '0' = dígitos
            $('#cro').mask('SS000000');

            // Máscara Dinâmica para Telefone/Celular: (00) 0000-0000 ou (00) 00000-0000
            var SPMaskBehavior = function (val) {
                // Checa o tamanho do valor. Se tiver 11 dígitos, é celular (9 dígitos + DDD), senão, é fixo (ou 10 dígitos)
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

            $('#telefone').mask(SPMaskBehavior, spOptions);
        });
    </script>
</body>
</html>