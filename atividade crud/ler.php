<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários Cadastrados</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 700px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: center; }
        th { background: #007bff; color: #fff; }
        tr:hover { background: #f1f1f1; }
        .acoes a { margin: 0 5px; color: #007bff; text-decoration: none; }
        .acoes a:hover { text-decoration: underline; }
        .novo { display: block; text-align: center; margin-top: 20px; color: #007bff; text-decoration: none; }
        .novo:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Usuários Cadastrados</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
            <?php
            $sql = "SELECT * FROM usuarios";
            $stmt = $pdo->query($sql);
            if ($stmt->rowCount() > 0) {
                foreach ($stmt as $row) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['nome']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['idade']}</td>";
                    echo "<td class='acoes'>
                            <a href='atualizar.php?id={$row['id']}'>Editar</a>
                            <a href='deletar.php?id={$row['id']}' onclick=\"return confirm('Tem certeza que deseja deletar?');\">Deletar</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum usuário cadastrado.</td></tr>";
            }
            ?>
        </table>
        <a class="novo" href="criar.php">Cadastrar novo usuário</a>
    </div>
</body>
</html>