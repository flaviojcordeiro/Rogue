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

// Buscar todos os itens do carrinho do usuário
$sql = "SELECT c.produto_id, c.quantidade, r.preco 
        FROM carrinho c
        INNER JOIN roupas r ON c.produto_id = r.id
        WHERE c.usuario_id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $total = 0;
    $itens = [];

    while ($row = $result->fetch_assoc()) {
        $itens[] = $row;
        $total += $row['preco'] * $row['quantidade'];
    }

    // Inserir o pedido no histórico
    $sql_pedido = "INSERT INTO historico_pedidos (usuario_id, total) VALUES (?, ?)";
    $stmt_pedido = $conexao->prepare($sql_pedido);
    $stmt_pedido->bind_param("id", $id_usuario, $total);
    if ($stmt_pedido->execute()) {
        $pedido_id = $stmt_pedido->insert_id;

        // Inserir os itens do pedido
        $sql_itens = "INSERT INTO historico_pedido_itens (pedido_id, produto_id, quantidade, preco) VALUES (?, ?, ?, ?)";
        $stmt_itens = $conexao->prepare($sql_itens);

        foreach ($itens as $item) {
            $stmt_itens->bind_param("iiid", $pedido_id, $item['produto_id'], $item['quantidade'], $item['preco']);
            $stmt_itens->execute();

            // Atualizar a quantidade em estoque
            $sql_update_estoque = "UPDATE roupas SET quantidade_estoque = quantidade_estoque - ? WHERE id = ?";
            $stmt_update_estoque = $conexao->prepare($sql_update_estoque);
            $stmt_update_estoque->bind_param("ii", $item['quantidade'], $item['produto_id']);
            $stmt_update_estoque->execute();
            $stmt_update_estoque->close();
        }

        // Limpar o carrinho do usuário
        $sql_limpar = "DELETE FROM carrinho WHERE usuario_id = ?";
        $stmt_limpar = $conexao->prepare($sql_limpar);
        $stmt_limpar->bind_param("i", $id_usuario);
        $stmt_limpar->execute();

        header("Location: finalizar_compra.php");
    } else {
        echo "Erro ao inserir no histórico de pedidos: " . $conexao->error;
    }

    $stmt_pedido->close();
    $stmt_itens->close();
} else {
    echo "Carrinho vazio.";
}

$stmt->close();
$conexao->close();
?>
