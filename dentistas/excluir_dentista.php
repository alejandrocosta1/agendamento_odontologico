<?php
include '../conexao.php'; 

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM Dentista WHERE id_dentista = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Dentista excluído com sucesso!";
    } else {
        echo "Erro ao excluir o dentista: " . $conexao->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "ID do dentista não especificado.";
}
?>
<br>
<a href="listar_dentistas.php">Voltar para a Listagem de Dentistas</a>