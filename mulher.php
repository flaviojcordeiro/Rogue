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
    <h1 class=titulocard>Feminino</h1>
    <div class="card-container">
        <div class="card">
        <img src="imagens/roupasaleatorias/femroupa1.png" alt="Item 1">
        <h3>Calça moletom Marrom</h3>
        <div class="btns">
            <button onclick="toggleFavorite('btn-fav4', 'mascroupa4')" id="btn-fav4" class="favorite-btn"><i class="fa-regular fa-heart"></i></button>
        </div>
        <p>R$ 229,99</p>
        <div class="add-carrinho">Adicionar ao carrinho</div>
        </div>
        <div class="card">
        <img src="imagens/roupasaleatorias/femroupa2.png" alt="Item 2">
        <h3>Saia esporte Preta</h3>
        <div class="btns">
            <button onclick="toggleFavorite('btn-fav5', 'mascroupa5')" id="btn-fav5" class="favorite-btn"><i class="fa-regular fa-heart"></i></button>
        </div>
        <p>R$ 149,99</p>
        <div class="add-carrinho">Adicionar ao carrinho</div>
        </div>
        <div class="card">
        <img src="imagens/roupasaleatorias/femroupa3.png" alt="Item 3">
        <h3>Jaqueta/Corta-vento Branca</h3>
        <div class="btns">
            <button onclick="toggleFavorite('btn-fav6', 'mascroupa6')" id="btn-fav6" class="favorite-btn"><i class="fa-regular fa-heart"></i></button>
        </div>
        <p>R$ 399,99</p>
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
<script>
    // Função para salvar ou remover favoritos no localStorage e servidor
    function toggleFavorite(buttonId, idRoupa) {
        const button = document.getElementById(buttonId);
        const isFavorite = button.classList.contains('favorite');

        <?php if (isset($_SESSION['nome'])) : ?>
            const userFavorite = !isFavorite;

            // Atualizar a aparência do botão
            button.classList.toggle('favorite');
            button.querySelector('i').classList.toggle('fa-solid');
            button.querySelector('i').classList.toggle('fa-regular');

            // Adicionar ou remover a classe 'red' apenas quando o item é favorito
            if (userFavorite) {
                button.classList.add('red');
            } else {
                button.classList.remove('red');
            }

            // Salvar no localStorage
            localStorage.setItem(buttonId, userFavorite);

            // Atualizar no servidor
            const formData = new FormData();
            formData.append('id_roupa', idRoupa);
            formData.append('favorite', userFavorite ? '1' : '0');

            fetch('update_favorites.php', {
                method: 'POST',
                body: formData
            }).catch(error => console.error('Erro ao atualizar favoritos no servidor:', error));
        <?php else : ?>
            window.location.href = 'login.php';
        <?php endif; ?>
    }

    // Função para carregar o estado dos favoritos ao iniciar a página
    function loadFavorites() {
        const buttons = document.querySelectorAll('.favorite-btn');
        buttons.forEach(button => {
            const buttonId = button.id;
            const isFavorite = localStorage.getItem(buttonId) === 'true';
            if (isFavorite) {
                button.classList.add('favorite');
                button.querySelector('i').classList.add('fa-solid');
                button.querySelector('i').classList.remove('fa-regular');
            }
        });
    }

    // Chamar a função ao carregar a página
    window.onload = loadFavorites;

    // Função para limpar os favoritos salvos no localStorage ao deslogar
    <?php if (!isset($_SESSION['nome'])) : ?>
        function clearLocalStorageFavorites() {
            const buttons = document.querySelectorAll('.favorite-btn');
            buttons.forEach(button => {
                const buttonId = button.id;
                localStorage.removeItem(buttonId);
            });
        }
        clearLocalStorageFavorites(); // Chama a função imediatamente ao deslogar
    <?php endif; ?>
</script>
</html>
