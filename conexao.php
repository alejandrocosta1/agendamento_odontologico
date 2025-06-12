<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "agendamento_odontologico";

// Cria a conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}
