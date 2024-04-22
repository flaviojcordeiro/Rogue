<?php
session_start();

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit;
}

// Verifica se o ID do produto a ser removido foi enviado
if (isset($_POST['produto_id'])) {
    $produto_id = $_POST['produto_id'];

    // Conexão com o banco de dados
    $conexao = new mysqli("localhost:3306", "root", "PUC@1234", "rogue");

    if ($conexao->connect_error) {
        die("Erro de conexão: " . $conexao->connect_error);
    }

    // Query para remover o produto do carrinho do usuário logado
    $stmt = $conexao->prepare("DELETE FROM carrinho WHERE usuario_id = ? AND produto_id = ?");
    $stmt->bind_param("ii", $_SESSION['id'], $produto_id);

    if ($stmt->execute()) {
        // Produto removido com sucesso, redireciona de volta para o carrinho
        header("Location: carrinho.php");
    } else {
        // Erro ao remover o produto
        echo "Erro ao remover o produto do carrinho.";
    }

    // Fecha a conexão e o statement
    $stmt->close();
    $conexao->close();
} else {
    // Se o ID do produto não foi enviado, redireciona para o carrinho
    header("Location: carrinho.php");
}
?>
