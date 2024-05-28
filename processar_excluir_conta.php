<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$id_usuario = $_SESSION['id'];


$conexao = new mysqli("localhost:3306", "root", "PUC@1234", "rogue");
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

$conexao->begin_transaction();

try {

    $sql_historico_pedidos = "DELETE FROM historico_pedidos WHERE usuario_id = ?";
    $stmt_historico_pedidos = $conexao->prepare($sql_historico_pedidos);
    $stmt_historico_pedidos->bind_param("i", $id_usuario);
    $stmt_historico_pedidos->execute();

    $sql_carrinho = "DELETE FROM carrinho WHERE usuario_id = ?";
    $stmt_carrinho = $conexao->prepare($sql_carrinho);
    $stmt_carrinho->bind_param("i", $id_usuario);
    $stmt_carrinho->execute();

    $sql_likes = "DELETE FROM roupas_likes WHERE usuario_id = ?";
    $stmt_likes = $conexao->prepare($sql_likes);
    $stmt_likes->bind_param("i", $id_usuario);
    $stmt_likes->execute();

    $sql_chat = "DELETE FROM chat WHERE usuario_id = ? OR atendente_id = ?";
    $stmt_chat = $conexao->prepare($sql_chat);
    $stmt_chat->bind_param("ii", $id_usuario, $id_usuario);
    $stmt_chat->execute();

    $sql_usuario = "DELETE FROM usuarios WHERE id = ?";
    $stmt_usuario = $conexao->prepare($sql_usuario);
    $stmt_usuario->bind_param("i", $id_usuario);
    $stmt_usuario->execute();

  
    $conexao->commit();


    session_destroy();
    header("Location: index.php");
} catch (Exception $e) {
    $conexao->rollback();
    echo "Erro ao excluir a conta: " . $e->getMessage();
}


$stmt_historico_pedidos->close();
$stmt_carrinho->close();
$stmt_likes->close();
$stmt_chat->close();
$stmt_usuario->close();
$conexao->close();
?>
