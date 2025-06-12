<?php
include '../conexao.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $data_nascimento = $_POST["data_nascimento"];

    $sql = "INSERT INTO Paciente (nome, CPF, telefone, email, data_nascimento) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssss", $nome, $cpf, $telefone, $email, $data_nascimento);

    if ($stmt->execute()) {
        echo "Paciente cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o paciente: " . $conexao->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "Acesso inválido.";
}
?>
<br>
<a href="listar_pacientes.php">Listar Pacientes</a>