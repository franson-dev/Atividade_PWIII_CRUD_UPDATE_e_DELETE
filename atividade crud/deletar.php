<?php
require 'config.php';

$id = $_GET['id'] ?? null;
if ($id) {
    try {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $msg = "Usuário deletado com sucesso!";
    } catch (PDOException $e) {
        $erro = "Erro ao deletar usuário: " . $e->getMessage();
    }
} else {
    header("Location: ler.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Deletar Usuário</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 400px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center; }
        h2 { color: #333; }
        .msg { margin-top: 15px; color: green; }
        .erro { margin-top: 15px; color: red; }
        .voltar { display: block; text-align: center; margin-top: 20px; color: #007bff; text-decoration: none; }
        .voltar:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Deletar Usuário</h2>
        <?php
        if (isset($msg)) echo "<div class='msg'>{$msg}</div>";
        if (isset($erro)) echo "<div class='erro'>{$erro}</div>";
        ?>
        <a class="voltar" href="ler.php">Voltar para lista</a>
    </div>
</body>
</html>