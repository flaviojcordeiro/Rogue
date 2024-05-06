<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit;
}

$conexao = new mysqli("localhost:3306", "root", "PUC@1234", "rogue");

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

$stmt = $conexao->prepare("SELECT r.id, r.nome, r.descricao, r.foto, r.preco, c.quantidade FROM carrinho c JOIN roupas r ON c.produto_id = r.id WHERE c.usuario_id = ?");
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $produtos_carrinho = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $produtos_carrinho = array();
}

$stmt->close();
$conexao->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://use.typekit.net/crc8stj.css">
    <link rel="icon" href="imagens/icon.png" type="image/x-icon">
    <title>Carrinho</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    <div class="content"></div>
    <main>
        <section class="carrinho-main">
            <div class="carrinho-header">
                <li class="nav-selecionado">Carrinho</li>
                <li>></li>
                <li>Pagamento</li>
                <li>></li>
                <li>Entrega</li>
            </div>
        </section>
        <section>
            <div class="lista-pedidos">
                <i class="fa-solid fa-cart-shopping"></i>
                <p class="cart-title">Meu carrinho</p>
            </div>
            <div class="content-carrinho">
                <section>
                    <table class="table-carrinho">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos_carrinho as $produto) : ?>
                                <tr>
                                    <td>
                                        <div class="produtocarrinho">
                                            <img src= <?php echo $produto['foto']; ?>
                                            <?php echo $produto['id']; ?> alt="<?php echo $produto['nome']; ?>">
                                            <div class="info">
                                                <div class="title"><?php echo $produto['nome']; ?></div>
                                                <div class="category"><?php echo $produto['descricao']; ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                                    <td> <?php echo $produto['quantidade']; ?> 
                                        </div>
                                    </td>
                                    <td>R$ <?php echo number_format($produto['preco'] * $produto['quantidade'], 2, ',', '.'); ?></td>
                                    <td>
                                        <form class="remover-form" method="post" action="rem_carrinho.php">
                                            <input type="hidden" name="produto_id" value="<?php echo $produto['id']; ?>">
                                            <button type="submit" class="remover-btn"><i class="fa-solid fa-xmark"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
                <aside>
                    <div class="box">
                        <header class="compra-resumo-title">Resumo da compra</header>
                        <div class="info">
                            <div><span>Sub-total</span><span>R$ <?php echo calcularSubtotal($produtos_carrinho); ?></span></div>
                            <div><span>Frete</span><span>Gratuito</span></div>
                        </div>
                        <footer>
                            <span>Total</span>
                            <span>R$ <?php echo calcularSubtotal($produtos_carrinho); ?></span>
                        </footer>
                    </div>
                    <a href="pagamento.php"><button class="finalizar-compra">Ir para pagamento</button></a>
                </aside>
            </div>

        </section>
    </main>

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

    <script>
        $(document).ready(function() {
            $(".remover-form").submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var formData = form.serialize();

                $.ajax({
                    type: "POST",
                    url: form.attr("action"),
                    data: formData,
                    success: function(response) {
                        alert(response);
                        location.reload(); // Recarrega a página após remover o produto do carrinho
                    },
                    error: function(xhr, status, error) {
                        alert("Erro ao remover produto do carrinho. Por favor, tente novamente.");
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>

<?php
// Função para calcular o subtotal dos produtos no carrinho
function calcularSubtotal($produtos_carrinho)
{
    $subtotal = 0;
    foreach ($produtos_carrinho as $produto) {
        $subtotal += $produto['preco'] * $produto['quantidade'];
    }
    return number_format($subtotal, 2, ',', '.');
}
?>
