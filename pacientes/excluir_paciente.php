<?php
include '../conexao.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM Paciente WHERE id_paciente = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Paciente excluído com sucesso!";
    } else {
        echo "Erro ao excluir o paciente: " . $conexao->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "ID do paciente não especificado.";
}
?>
<br>
<a href="listar_pacientes.php">Voltar para a Listagem de Pacientes</a>