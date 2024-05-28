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
                <li class="carrinho"><a href="carrinho.php"><img src="imagens/carrinho.png" alt="Carrinho"></a></li>
                <li class="config"><a href="editar_usuario.php"><img src="imagens/config.png" alt="config"></a></li>
                <li class="logo"><a href="logout.php"><img src="imagens/logouticon.png" alt="Logout"></a></li>
            </ul>
        </div>
        <div class="nav-items-mini">
            <ul>
                <li><a href="index.php">home</a></li>
                <li><a href="guardaroupas.php">guarda-roupa</a></li>
                <li><a href="homem.php">masculino</a></li>
                <li><a href="mulher.php">feminino</a></li>
                <li><a href="quemsomos.php">quem somos</a></li>
                <li class="carrinho"><a href="carrinho.php"><img src="imagens/carrinho.png" alt="carrinho"></a></li>
                <li class="config"><a href="editar_usuario.php"><img src="imagens/config.png" alt="config"></a></li>
                <li class="logo"><a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a></li>
            </ul>
        </div>
        <div class="action-button">
            <i class="fa-solid fa-bars"></i>
        </div>
    </nav>

    <body>
    <h1>Histórico de Pedidos</h1>

<div class="content">
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
        $sql = "SELECT * FROM historico_pedidos WHERE usuario_id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='pedido'>";
                echo "<h2>Pedido #" . $row['id'] . "</h2>";
                echo "<p>Data do Pedido: " . $row['data_pedido'] . "</p>";

                // Buscar os itens associados a este pedido
                $sql_itens = "SELECT r.nome, r.descricao, r.preco, r.foto, cp.quantidade FROM historico_pedidos cp INNER JOIN roupas r ON cp.produto_id = r.id WHERE cp.id = ?";
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
                    echo "<p>Preço: R$" . $item['preco'] . "</p>";
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

    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <h1 class="rogue-footer">Rogue</h1>
                <p>Encontre o seu estilo na Rogue.</p>

                <div id="footer_social_media">
                    <a href="#" class="footer-link" id="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" class="footer-link" id="facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" class="footer-link" id="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <ul class="footer-list">
                <li>
                    <h3 class="subtitle-footer">Minha Conta</h3>
                </li>
                <li>
                    <a href="guardaroupas.php" class="footer-link">Guarda Roupas</a>
                </li>
                <li>
                    <a href="carrinho.php" class="footer-link">Meu Carrinho</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Roupas</a>
                </li>
            </ul>

            <ul class="footer-list">
                <li>
                    <h3 class="subtitle-footer">Produtos</h3>
                </li>
                <li>
                    <a href="index.php" class="footer-link">Home</a>
                </li>
                <li>
                    <a href="homem.php" class="footer-link">Homem</a>
                </li>
                <li>
                    <a href="mulher.php" class="footer-link">Mulher</a>
                </li>
            </ul>

            <div id="footer_subscribe">
                <h3 class="contatotitulo-footer">Contato</h3>

                <p>
                    Digite seu e-mail para entrar em contato conosco!
                </p>

                <div id="input_group">
                    <input type="email" id="email">
                    <button>
                        <i class="fa-regular fa-envelope"></i>
                    </button>
                </div>
            </div>
            <div id="footer_copyright">
                <p>Todos os direitos reservados</p>
            </div>
        </div>
    </footer>
</body>

</html>
