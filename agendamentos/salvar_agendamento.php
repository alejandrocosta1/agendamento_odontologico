<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_paciente = $_POST["id_paciente"];
    $id_dentista = $_POST["id_dentista"];
    $data_agendamento = $_POST["data_agendamento"];
    $status = $_POST["status"];

    $sql = "INSERT INTO Agendamento (id_paciente, id_dentista, data_agendamento, status) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iiss", $id_paciente, $id_dentista, $data_agendamento, $status);

    if ($stmt->execute()) {
        echo "Agendamento cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o agendamento: " . $conexao->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "Acesso inválido.";
}
?>
<br>
<a href="listar_agendamento.php">Listar Agendamentos</a>