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
    <link href="https://fonts.googleapis.com/css2?family=Grandiflora+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gantari:ital,wght@0,100..900;1,100..900&family=Grandiflora+One&display=swap" rel="stylesheet">
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
                    <li class="logo">
                        <a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a>
                    </li>
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
 
</div>
<section class="quemsomos">
    <h1 class="quemsomos-h1">QUEM SOMOS</h1>
    <p class="quemsomos-main-txt">Rogue, sua nova experiência de moda online que desafia as convenções. Na Rogue, não apenas oferecemos roupas, mas um estilo de vida. Nossa coleção é uma mistura única de elegância e ousadia, projetada para aqueles que se atrevem a ser diferentes. Desde peças clássicas reinventadas até as últimas tendências da moda, cada item em nossa loja é cuidadosamente selecionado para garantir qualidade e estilo inigualáveis. Seja você mesmo, seja autêntico, seja Rogue. Explore nossa loja hoje e descubra o que significa vestir-se com confiança e originalidade.</p>
    <section class="quemsomos-body">
        <section>
            <div class="quemsomos1">
                <img src="imagens/quemsomos/roupas-quemsomos.webp">
                <p>Descubra a verdadeira expressão do seu estilo com as roupas da Rogue. Em cada costura, encontrará o compromisso impecável com a qualidade e o design exclusivo que tornam nossas peças únicas. Do casual ao elegante, cada item reflete a dedicação à excelência artesanal e aos materiais premium. Vista-se com confiança, sabendo que cada escolha é uma afirmação de seu estilo distinto. Descubra o que é ser autêntico. Descubra Rogue.</p>
            </div>
        </section>

        <section>
            <div class="quemsomos2">
                <img src="imagens/quemsomos/estoque-quemsomos.webp">
                <p>Explore o tesouro de estilo na Rogue! Nosso estoque é um universo de possibilidades para quem busca se destacar com elegância e autenticidade. De peças clássicas a tendências inovadoras, cada item foi selecionado com cuidado para atender aos mais exigentes gostos. Do casual descontraído ao sofisticado, encontrará tudo o que precisa para criar looks que refletem sua personalidade única. Não espere mais para descobrir as joias escondidas em nosso estoque. Visite-nos hoje mesmo e deixe sua moda falar por si mesma com a Rogue.</p>
            </div>
        </section>

        <section>
            <div class="quemsomos3">
                <img src="imagens/quemsomos/suporte-quemsomos.png">
                <p>Com o suporte ao cliente online da Rogue, sua experiência de compra atinge um novo patamar de conveniência e excelência. Nossa equipe está sempre à disposição para responder às suas dúvidas, auxiliar com suas escolhas e garantir que sua jornada de compras seja suave e satisfatória. Seja através de chat ao vivo, e-mail ou redes sociais, estamos aqui para oferecer orientação personalizada e resolver qualquer questão que você possa ter. Com o suporte online da Rogue, você nunca está sozinho na busca pelo estilo perfeito. Experimente hoje mesmo e descubra o padrão de atendimento que nos torna a escolha preferida dos fashionistas exigentes.</p>
            </div>
        </section>

    </section>
</section>
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
                    <a href="homem.php" class="footer-link">Masculino</a>
                </li>
                <li>
                    <a href="mulher.php" class="footer-link">Feminino</a>
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