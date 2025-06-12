<?php
include '../conexao.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cro = $_POST["cro"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];

    $sql = "INSERT INTO Dentista (nome, CRO, telefone, email) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $nome, $cro, $telefone, $email);

    if ($stmt->execute()) {
        echo "Dentista cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o dentista: " . $conexao->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "Acesso inválido.";
}
?>
<br>
<a href="listar_dentistas.php">Listar Dentistas</a>