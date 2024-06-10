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
$sql = "SELECT id, data_pedido, total FROM historico_pedidos WHERE usuario_id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Histórico de Pedidos</title>
</head>
<body bgcolor="FFFEF8">
    <nav class="navbar">
        <div class="nav-items">
            <img src="imagens/roguelogobranca.png" id="logokkjk">
            <ul>
                <li><a href="index.php">home</a></li>
                <li><a href="guardaroupas.php">guarda-roupa</a></li>
                <li><a href="homem.php">masculino</a></li>
                <li><a href="mulher.php">feminino</a></li>
                <li><a href="quemsomos.php">quem somos</a></li>
                <li class="carrinho"><a href="carrinho.php"><img src="imagens/carrinho.png" alt="carrinho"></a></li>
                <li class="logo"><a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a></li>
            </ul>
        </div>
        <div class="user-welcome">Bem vindo, <?php echo $_SESSION['nome'];?> </div>
        <div class="action-button">
            <i class="fa-solid fa-bars"></i>
        </div>
    </nav>

    <div class="content">
        <h1>Histórico de Pedidos</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='pedido'>";
                echo "<h2>Pedido #" . $row['id'] . "</h2>";
                echo "<p>Data do Pedido: " . $row['data_pedido'] . "</p>";
                echo "<p>Valor Total: R$" . number_format($row['total'], 2, ',', '.') . "</p>";

                // Buscar os itens associados a este pedido
                $sql_itens = "SELECT r.nome, r.descricao, r.preco, r.foto, hpi.quantidade 
                              FROM historico_pedido_itens hpi 
                              INNER JOIN roupas r ON hpi.produto_id = r.id 
                              WHERE hpi.pedido_id = ?";
                $stmt_itens = $conexao->prepare($sql_itens);
                $stmt_itens->bind_param("i", $row['id']);
                $stmt_itens->execute();
                $result_itens = $stmt_itens->get_result();

                echo "<ul class='itens'>";
                while ($item = $result_itens->fetch_assoc()) {
                    echo "<li>";
                    echo "<img src='" . $item['foto'] . "' alt='" . $item['nome'] . "' width='100'>";
                    echo "<div>";
                    echo "<p>Produto: " . $item['nome'] . "</p>";
                    echo "<p>Descrição: " . $item['descricao'] . "</p>";
                    echo "<p>Quantidade: " . $item['quantidade'] . "</p>";
                    echo "<p>Preço: R$" . number_format($item['preco'], 2, ',', '.') . "</p>";
                    echo "</div>";
                    echo "</li>";
                }
                echo "</ul>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum pedido encontrado.</p>";
        }

        $stmt->close();
        $conexao->close();
        ?>
    </div>
</body>
</html>
