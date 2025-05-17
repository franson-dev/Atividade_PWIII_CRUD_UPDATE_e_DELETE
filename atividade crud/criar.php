<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
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
        <h2>Cadastrar Usuário</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = filter_var($_POST["nome"], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            $idade = filter_var($_POST["idade"], FILTER_SANITIZE_NUMBER_INT);

            try {
                $sql = "INSERT INTO usuarios (nome, email, idade) VALUES (:nome, :email, :idade)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':nome' => $nome,
                    ':email' => $email,
                    ':idade' => $idade
                ]);
                echo '<div class="msg">Usuário cadastrado com sucesso!</div>';
            } catch (PDOException $e) {
                echo '<div class="erro">Erro ao cadastrar usuário: ' . $e->getMessage() . '</div>';
            }
        }
        ?>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="idade">Idade:</label>
            <input type="number" name="idade" id="idade" required>

            <input type="submit" value="Cadastrar">
        </form>
        <a class="voltar" href="ler.php">Ver usuários cadastrados</a>
    </div>
</body>
</html>
