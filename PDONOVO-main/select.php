<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .card-header {
            background: linear-gradient(45deg, #2193b0, #6dd5ed);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
        }
        .table {
            margin-bottom: 0;
        }
        .table thead th {
            background: linear-gradient(45deg, #2193b0, #6dd5ed);
            color: white;
            border: none;
            padding: 15px;
            font-weight: 600;
        }
        .table tbody td {
            padding: 15px;
            vertical-align: middle;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(33, 147, 176, 0.05);
        }
        .btn {
            border-radius: 6px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .btn-warning {
            background: linear-gradient(45deg, #f7b733, #fc4a1a);
            border: none;
            color: white;
        }
        .btn-danger {
            background: linear-gradient(45deg, #ff512f, #dd2476);
            border: none;
        }
        .btn-success {
            background: linear-gradient(45deg, #2193b0, #6dd5ed);
            border: none;
        }
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        .novo-usuario-btn {
            color: #2193b0;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-bottom: 20px;
            font-weight: 500;
            padding: 10px 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .novo-usuario-btn:hover {
            color: #1c7a94;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <a href="form.php" class="novo-usuario-btn">
            <i class="fas fa-user-plus me-2"></i> Novo Usuário
        </a>
        <div class="card">
            <div class="card-header text-center">
                <h2 class="mb-0"><i class="fas fa-users me-2"></i>Usuários Cadastrados</h2>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag me-2"></i>ID</th>
                                <th><i class="fas fa-user me-2"></i>Nome</th>
                                <th><i class="fas fa-envelope me-2"></i>Email</th>
                                <th><i class="fas fa-phone me-2"></i>Telefone</th>
                                <th class="text-center"><i class="fas fa-cogs me-2"></i>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'database.php';
                            $sql = "SELECT * FROM usuarios";
                            $stmt = $pdo->query($sql);
                            while ($row = $stmt->fetch()): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= htmlspecialchars($row['nome']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['telefone']) ?></td>
                                <td>
                                    <div class="action-buttons justify-content-center">
                                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit me-1"></i>Editar
                                        </a>
                                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                                            <i class="fas fa-trash-alt me-1"></i>Deletar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
