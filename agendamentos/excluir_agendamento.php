<?php
include '../conexao.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM Agendamento WHERE id_agendamento = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Agendamento excluído com sucesso!";
    } else {
        echo "Erro ao excluir o agendamento: " . $conexao->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "ID do agendamento não especificado.";
}
?>
<br>
<a href="listar_agendamento.php">Voltar para a Listagem de Agendamentos</a>