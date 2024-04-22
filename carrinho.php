<?php
session_start(); 

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
}
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
    <title>rogue</title>
    <?php session_start(); ?>
    <?php if (isset($_SESSION['nome'])) : ?>
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
                    <li><a href="editar_usuario.php">Editar Informações</a></li>
                    <li class="logo">
                        <span><?php echo $_SESSION['nome']; ?></span>
                        <a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a>
                    </li>
                </ul>
            </div>
        </nav>
    <?php else : ?>
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
                    <li class="carrinho"><a href="login.php"><img src="imagens/loginicon.png" alt="logout"></a></li>
                </ul>
            </div>
        </nav>
    <?php endif; ?>
</head>

<body bgcolor="FFFEF8">
    <div class="content"></div>
    <main>
        <section class="carrinho-main">
            <div class="carrinho-header">
                <li class="nav-selecionado">Carrinho</li>
                <li>></li>
                <li>Pagamento</li>
                <li>></li>
                <li>Entrega</li>
                <li>></li>
                <li>Finalizar compra</li>
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
                            <tr>
                                <td>
                                    <div class="product">
                                        <img src="https://picsum.photos/100/120" alt="">
                                        <div class="info">
                                            <div class="title">Nome do produto</div>
                                            <div class="category">Categoria</div>
                                        </div>
                                    </div>
                                </td>
                                <td>R$ 120</td>
                                <td>
                                    <div class="qty">
                                        <button>-</button>
                                        <span>2</span>
                                        <button>+</button>
                                    </div>
                                </td>
                                <td>R$ 240</td>
                                <td>
                                    <i class="fa-solid fa-xmark"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product">
                                        <img src="https://picsum.photos/100/120" alt="">
                                        <div class="info">
                                            <div class="title">Nome do produto</div>
                                            <div class="category">Categoria</div>
                                        </div>
                                    </div>
                                </td>
                                <td>R$ 120</td>
                                <td>
                                    <div class="qty">
                                        <button>-</button>
                                        <span>2</span>
                                        <button>+</button>
                                    </div>
                                </td>
                                <td>R$ 240</td>
                                <td>
                                    <i class="fa-solid fa-xmark"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product">
                                        <img src="https://picsum.photos/100/120" alt="">
                                        <div class="info">
                                            <div class="title">Nome do produto</div>
                                            <div class="category">Categoria</div>
                                        </div>
                                    </div>
                                </td>
                                <td>R$ 120</td>
                                <td>
                                    <div class="qty">
                                        <button>-</button>
                                        <span>2</span>
                                        <button>+</button>
                                    </div>
                                </td>
                                <td>R$ 240</td>
                                <td>
                                    <i class="fa-solid fa-xmark"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <aside>
                    <div class="box">
                        <header class="compra-resumo-title">Resumo da compra</header>
                        <div class="info">
                            <div><span>Sub-total</span><span>R$ 418</span></div>
                            <div><span>Frete</span><span>Gratuito</span></div>
                            <div><button class="cupom-desconto">Cupom de desconto<i class="fa-light fa-arrow-right"></i></button></div>
                        </div>
                        <footer>
                            <span>Total</span>
                            <span>R$ 418</span>
                        </footer>
                    </div>
                    <button class="finalizar-compra">Finalizar compra</button>
                </aside>
            </div>

        </section>
    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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