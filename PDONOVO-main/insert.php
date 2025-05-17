<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO usuarios (nome, email, telefone) VALUES (:nome, :email, :telefone)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);

    if ($stmt->execute()) {
        echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href='select.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar!');</script>";
    }
}
?>