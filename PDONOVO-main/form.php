<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
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
        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(33, 147, 176, 0.25);
            border-color: #2193b0;
        }
        .btn-primary {
            background: linear-gradient(45deg, #2193b0, #6dd5ed);
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            background: linear-gradient(45deg, #1c7a94, #5cbad1);
        }
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        .input-group-text {
            background-color: #f8f9fa;
            border: 1px solid #e0e0e0;
        }
        .voltar-btn {
            color: #2193b0;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .voltar-btn:hover {
            color: #1c7a94;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <a href="select.php" class="voltar-btn">
            <i class="fas fa-arrow-left me-2"></i> Voltar para a lista
        </a>
        <div class="card">
            <div class="card-header text-center">
                <h2 class="mb-0"><i class="fas fa-user-plus me-2"></i>Cadastro de Usuário</h2>
            </div>
            <div class="card-body p-4">
                <form action="insert.php" method="POST">
                    <div class="mb-4">
                        <label class="form-label">Nome:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Email:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Telefone:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" name="telefone" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-save me-2"></i>Cadastrar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

