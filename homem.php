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
                    <li class="config"><a href="editar_usuario.php"><img src="imagens/config.png" alt="config"></a></li>
                    <li class="logo"><a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a></li>
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
                <div class="user-welcome">Bem vindo, <?php echo $_SESSION['nome'];?> </div>
            <div class="action-button">
                <i class="fa-solid fa-bars"></i>
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
            <div class="nav-items-mini">
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
            <div class="action-button">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>
    <?php endif; ?>
</head>

<body bgcolor="FFFEF8">
    <div class="content">
    <h1 class=titulocard>Masculino</h1>
    <div class="card-container">
        <div class="card">
        <img src="imagens/roupasaleatorias/mascroupa1.png" alt="Item 1">
        <h3>Bermuda moletom Beje</h3>
        <div class="btns">
            <button onclick="Toggle1()" id="btn-fav1" class="favorite-btn"><i class="fa-regular fa-heart"></i></button>
        </div>
            <script>
                var btnvar1 = document.getElementById('btn-fav1');
                function Toggle1(){
                    if(btnvar1.style.color =="red") {
                        btnvar1.style.color = "grey"
                    }
                    else {
                        btnvar1.style.color = "red"
                    }
                }
            </script>
        <p>R$ 149,99</p>
        <div class="add-carrinho">Adicionar ao carrinho</div>
        </div>
        <div class="card">
        <img src="imagens/roupasaleatorias/mascroupa2.png" alt="Item 2">
        <h3>Jaqueta USA Azul</h3>
        <div class="btns">
            <button onclick="Toggle2()" id="btn-fav2" class="favorite-btn"><i class="fa-regular fa-heart"></i></button>
        </div>
            <script>
                var btnvar2 = document.getElementById('btn-fav2');
                function Toggle2(){
                    if(btnvar2.style.color =="red") {
                        btnvar2.style.color = "grey"
                    }
                    else {
                        btnvar2.style.color = "red"
                    }
                }
            </script>
        <p>R$ 249,99</p>
        <div class="add-carrinho">Adicionar ao carrinho</div>
        </div>
        <div class="card">
        <img src="imagens/roupasaleatorias/mascroupa3.png" alt="Item 3">
        <h3>Polo Branca</h3>
        <div class="btns">
            <button onclick="Toggle3()" id="btn-fav3" class="favorite-btn"><i class="fa-regular fa-heart"></i></button>
        </div>
            <script>
                var btnvar3 = document.getElementById('btn-fav3');
                function Toggle3(){
                    if(btnvar3.style.color =="red") {
                        btnvar3.style.color = "grey"
                    }
                    else {
                        btnvar3.style.color = "red"
                    }
                }
            </script>
        <p>R$ 99,99</p>
        <div class="add-carrinho">Adicionar ao carrinho</div>
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
<script src="script.js"></script>
</html>
