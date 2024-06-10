<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// Conexão com o banco de dados
$conexao = new mysqli("localhost:3306", "root", "PUC@1234", "rogue");
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

$id_usuario = $_SESSION['id'];

// Iniciar uma transação
$conexao->begin_transaction();

try {
    // Buscar itens do carrinho do usuário
    $sql_carrinho = "SELECT c.produto_id, c.quantidade, r.preco FROM carrinho c INNER JOIN roupas r ON c.produto_id = r.id WHERE c.usuario_id = ?";
    $stmt_carrinho = $conexao->prepare($sql_carrinho);
    $stmt_carrinho->bind_param("i", $id_usuario);
    $stmt_carrinho->execute();
    $result_carrinho = $stmt_carrinho->get_result();

    if ($result_carrinho->num_rows > 0) {
        $total_pedido = 0;

        // Calcular o total do pedido
        while ($item = $result_carrinho->fetch_assoc()) {
            $total_pedido += $item['preco'] * $item['quantidade'];
        }

        // Inserir um novo pedido
        $sql_pedido = "INSERT INTO historico_pedidos (usuario_id, total, data_pedido) VALUES (?, ?, NOW())";
        $stmt_pedido = $conexao->prepare($sql_pedido);
        $stmt_pedido->bind_param("id", $id_usuario, $total_pedido);
        $stmt_pedido->execute();

        // Obter o ID do pedido recém-criado
        $pedido_id = $stmt_pedido->insert_id;

        // Inserir itens do carrinho no pedido
        $stmt_carrinho->execute();
        $result_carrinho = $stmt_carrinho->get_result();

        while ($item = $result_carrinho->fetch_assoc()) {
            $produto_id = $item['produto_id'];
            $quantidade = $item['quantidade'];
            $preco = $item['preco'];

            $sql_item = "INSERT INTO historico_pedido_itens (pedido_id, produto_id, quantidade, preco) VALUES (?, ?, ?, ?)";
            $stmt_item = $conexao->prepare($sql_item);
            $stmt_item->bind_param("iiid", $pedido_id, $produto_id, $quantidade, $preco);
            $stmt_item->execute();

            // Diminuir a quantidade do estoque
            $sql_estoque = "UPDATE roupas SET quantidade_estoque = quantidade_estoque - ? WHERE id = ?";
            $stmt_estoque = $conexao->prepare($sql_estoque);
            $stmt_estoque->bind_param("ii", $quantidade, $produto_id);
            $stmt_estoque->execute();
        }

        // Limpar o carrinho
        $sql_limpar_carrinho = "DELETE FROM carrinho WHERE usuario_id = ?";
        $stmt_limpar_carrinho = $conexao->prepare($sql_limpar_carrinho);
        $stmt_limpar_carrinho->bind_param("i", $id_usuario);
        $stmt_limpar_carrinho->execute();

        // Commit da transação
        $conexao->commit();
        header("Location: finalizar_compra.php"); 
    } else {
        throw new Exception("Carrinho vazio");
    }
} catch (Exception $e) {
    // Rollback da transação em caso de erro
    $conexao->rollback();
    echo "Erro ao finalizar compra: " . $e->getMessage();
}

$conexao->close();
?>
