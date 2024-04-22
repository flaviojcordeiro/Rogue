<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['produto_id'])) {
    $produto_id = $_POST['produto_id'];

    // Conexão com o banco de dados
    $conexao = new mysqli("localhost:3306", "root", "PUC@1234", "rogue");

    if ($conexao->connect_error) {
        die("Erro de conexão: " . $conexao->connect_error);
    }

    $stmt = $conexao->prepare("SELECT quantidade FROM carrinho WHERE usuario_id = ? AND produto_id = ?");
    $stmt->bind_param("ii", $_SESSION['id'], $produto_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($quantidade);
        $stmt->fetch();
        $nova_quantidade = $quantidade + 1;

        $stmt = $conexao->prepare("UPDATE carrinho SET quantidade = ? WHERE usuario_id = ? AND produto_id = ?");
        $stmt->bind_param("iii", $nova_quantidade, $_SESSION['id'], $produto_id);
        $stmt->execute();
    } else {
        $stmt = $conexao->prepare("INSERT INTO carrinho (usuario_id, produto_id, quantidade) VALUES (?, ?, 1)");
        $stmt->bind_param("ii", $_SESSION['id'], $produto_id);
        $stmt->execute();
    }

    $stmt->close();
    $conexao->close();

    header("Location: " . $_SERVER["HTTP_REFERER"]);
} else {

    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>