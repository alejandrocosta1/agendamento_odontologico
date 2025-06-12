<?php
include '../conexao.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_dentista = $_POST["id_dentista"];
    $nome = $_POST["nome"];
    $cro = $_POST["cro"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];

    $sql = "UPDATE Dentista SET nome=?, CRO=?, telefone=?, email=? WHERE id_dentista=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssi", $nome, $cro, $telefone, $email, $id_dentista);

    if ($stmt->execute()) {
        echo "Dentista atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o dentista: " . $conexao->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "Acesso inválido.";
}
?>
<br>
<a href="listar_dentistas.php">Voltar para a Listagem</a>