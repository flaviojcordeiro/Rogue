<?php
session_start();

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit;
}

// Conexão com o banco de dados
$conexao = new mysqli("localhost:3306", "root", "PUC@1234", "rogue");
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

$id_usuario = $_SESSION['id'];

// Consulta para selecionar os itens do carrinho do cliente logado
$sql_carrinho = "SELECT * FROM carrinho WHERE usuario_id = ?";
$stmt_carrinho = $conexao->prepare($sql_carrinho);
$stmt_carrinho->bind_param("i", $id_usuario);
$stmt_carrinho->execute();
$resultado_carrinho = $stmt_carrinho->get_result();

// Preparar a inserção dos itens do carrinho no histórico de pedidos
$sql_inserir_pedido = "INSERT INTO historico_pedidos (usuario_id, produto_id, quantidade, preco) VALUES (?, ?, ?, ?)";
$stmt_inserir_pedido = $conexao->prepare($sql_inserir_pedido);
$stmt_inserir_pedido->bind_param("iiid", $id_usuario, $produto_id, $quantidade, $preco);

// Iterar sobre os itens do carrinho e inseri-los no histórico de pedidos
while ($item_carrinho = $resultado_carrinho->fetch_assoc()) {
    $produto_id = $item_carrinho['produto_id'];
    $quantidade = $item_carrinho['quantidade'];
    $preco = obterPrecoProduto($conexao, $produto_id); // Função que obtém o preço do produto do banco de dados
    $stmt_inserir_pedido->execute();
    diminuirQuantidadeProduto($conexao, $produto_id, $quantidade); // Função para diminuir a quantidade do produto no banco de dados
}

// Limpar o carrinho após inserir os pedidos no histórico
$sql_limpar_carrinho = "DELETE FROM carrinho WHERE usuario_id = ?";
$stmt_limpar_carrinho = $conexao->prepare($sql_limpar_carrinho);
$stmt_limpar_carrinho->bind_param("i", $id_usuario);
$stmt_limpar_carrinho->execute();

// Redirecionar para a página de histórico de pedidos
header("Location: historico_pedidos.php");

// Função para obter o preço do produto do banco de dados
function obterPrecoProduto($conexao, $produto_id) {
    $sql_preco_produto = "SELECT preco FROM roupas WHERE id = ?";
    $stmt_preco_produto = $conexao->prepare($sql_preco_produto);
    $stmt_preco_produto->bind_param("i", $produto_id);
    $stmt_preco_produto->execute();
    $resultado_preco_produto = $stmt_preco_produto->get_result();
    $preco_produto = $resultado_preco_produto->fetch_assoc()['preco'];
    return $preco_produto;
}

// Função para diminuir a quantidade do produto no banco de dados
function diminuirQuantidadeProduto($conexao, $produto_id, $quantidade) {
    $sql_diminuir_quantidade = "UPDATE roupas SET quantidade_estoque = quantidade_estoque - ? WHERE id = ?";
    $stmt_diminuir_quantidade = $conexao->prepare($sql_diminuir_quantidade);
    $stmt_diminuir_quantidade->bind_param("ii", $quantidade, $produto_id);
    $stmt_diminuir_quantidade->execute();
}
?>
