<?php
$dsn = "mysql:host=localhost;dbname=banco_crud;charset=utf8";
$usuario = "root"; 
$senha = ""; 

try {
    $pdo = new PDO($dsn, $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>