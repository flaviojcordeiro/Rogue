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
    <title>rogue</title>
        <nav class="navbar">
            <div class="nav-items">
                <img src="imagens/roguelogobranca.png" id="logokkjk">
                <ul>
                    <li><a href="index.php">home</a></li>
                    <li><a href="guardaroupas.php">guarda-roupa</a></li>
                    <li><a href="homem.php">homem</a></li>
                    <li><a href="mulher.php">mulher</a></li>
                    <li><a href="quemsomos.php">quem somos</a></li>
                    <li class="carrinho"><a href="carrinho.php"><img src="imagens/carrinho.png" alt="carrinho"></a></li>
                    <li class="logo"><a href="login.php"><img src="imagens/loginicon.png" alt="logo"></a></li>
                </ul>
            </div>
        </nav>
</head>

<body bgcolor="FFFEF8">
    <div class="content">
    <h1 class=titulocard>Feminino</h1>
    <div class="card-container">
        <div class="card">
        <img src="imagens/roupasaleatorias/femroupa1.png" alt="Item 1">
        <h3>Calça moletom Marrom</h3>
        <p>R$ 229,99</p>
        </div>
        <div class="card">
        <img src="imagens/roupasaleatorias/femroupa2.png" alt="Item 2">
        <h3>Saia esporte Preta</h3>
        <p>R$ 149,99</p>
        </div>
        <div class="card">
        <img src="imagens/roupasaleatorias/femroupa3.png" alt="Item 3">
        <h3>Jaqueta/Corta-vento Branca</h3>
        <p>R$ 399,99</p>
        </div>
    </div>
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