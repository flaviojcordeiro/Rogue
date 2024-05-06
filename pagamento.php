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
    <title>Pagamento</title>
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
        <section class="pagamento-main">
            <div class="pagamento-header">
                <h2>Pagamento</h2>
            </div>
            <div class="pagamento-form">
                <p>Envie o valor total da sua compra via Pix para o seguinte QR Code:</p>
                <img src="imagens/qrcodepix.jpeg" alt="QR Code Pix">
                <p>Código pix Copia e Cola: 00020126330014BR.GOV.BCB.PIX0111141396329335204000053039865802BR5924EDUARDO DO PRADO BONACIN6009SAO PAULO62250521k5QRPBXtP59yhbCSt2wdf63045A3F</p>
                <p>Após o pagamento, clique no botão abaixo para finalizar a compra.</p>
                <form action="finalizar_compra.php" method="POST">
                    <button type="submit" class="btn-finalizar">Finalizar Compra</button>
                </form>
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
</body>

</html>
