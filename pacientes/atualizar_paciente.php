<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_paciente = $_POST["id_paciente"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $data_nascimento = $_POST["data_nascimento"];

    $sql = "UPDATE Paciente SET nome=?, CPF=?, telefone=?, email=?, data_nascimento=? WHERE id_paciente=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssssi", $nome, $cpf, $telefone, $email, $data_nascimento, $id_paciente);

    if ($stmt->execute()) {
        echo "Paciente atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o paciente: " . $conexao->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "Acesso inválido.";
}
?>
<br>
<a href="listar_pacientes.php">Voltar para a Listagem</a>