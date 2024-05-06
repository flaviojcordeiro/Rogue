<?php
session_start();

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit;
}

// Conexão com o banco de dados
$conexao = new mysqli("localhost", "root", "PUC@1234", "rogue");
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

$id_usuario = $_SESSION['id'];
$sql = "DELETE FROM carrinho WHERE usuario_id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_usuario);

if ($stmt->execute()) {
    header("Location: index.php"); 
} else {
    echo "Erro ao limpar o carrinho: " . $conexao->error;
}

$stmt->close();
$conexao->close();
?>
