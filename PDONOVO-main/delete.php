<?php
require 'database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID inválido.");
}

$sql = "DELETE FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo "<script>alert('Usuário excluído com sucesso!'); window.location.href='select.php';</script>";
} else {
    echo "<script>alert('Erro ao excluir usuário!');</script>";
}
?>
