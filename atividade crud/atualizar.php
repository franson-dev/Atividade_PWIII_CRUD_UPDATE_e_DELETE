<?php
require 'config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: ler.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_var($_POST["nome"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $idade = filter_var($_POST["idade"], FILTER_SANITIZE_NUMBER_INT);

    try {
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, idade = :idade WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':idade' => $idade,
            ':id' => $id
        ]);
        $msg = "Usuário atualizado com sucesso!";
    } catch (PDOException $e) {
        $erro = "Erro ao atualizar usuário: " . $e->getMessage();
    }
}

$sql = "SELECT * FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    header("Location: ler.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Usuário</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 400px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        label { display: block; margin-top: 15px; color: #555; }
        input[type="text"], input[type="email"], input[type="number"] {
            width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%; background: #007bff; color: #fff; border: none; padding: 10px; margin-top: 20px; border-radius: 4px; cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover { background: #0056b3; }
        .msg { text-align: center; margin-top: 15px; color: green; }
        .erro { text-align: center; margin-top: 15px; color: red; }
        .voltar { display: block; text-align: center; margin-top: 20px; color: #007bff; text-decoration: none; }
        .voltar:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Atualizar Usuário</h2>
        <?php
        if (isset($msg)) echo "<div class='msg'>{$msg}</div>";
        if (isset($erro)) echo "<div class='erro'>{$erro}</div>";
        ?>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>

            <label for="idade">Idade:</label>
            <input type="number" name="idade" id="idade" value="<?= htmlspecialchars($usuario['idade']) ?>" required>

            <input type="submit" value="Atualizar">
        </form>
        <a class="voltar" href="ler.php">Voltar para lista</a>
    </div>
</body>
</html>