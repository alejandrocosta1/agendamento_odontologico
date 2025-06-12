<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_agendamento = $_POST["id_agendamento"];
    $id_paciente = $_POST["id_paciente"];
    $id_dentista = $_POST["id_dentista"];
    $data_agendamento = $_POST["data_agendamento"];
    $status = $_POST["status"];

    $sql = "UPDATE Agendamento SET id_paciente=?, id_dentista=?, data_agendamento=?, status=? WHERE id_agendamento=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iissi", $id_paciente, $id_dentista, $data_agendamento, $status, $id_agendamento);

    if ($stmt->execute()) {
        echo "Agendamento atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o agendamento: " . $conexao->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "Acesso inválido.";
}
?>
<br>
<a href="listar_agendamentos.php">Voltar para a Listagem</a>