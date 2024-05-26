<?php
session_start();

// Redirecionar se não estiver logado
if (!isset($_SESSION['nome']) || !isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// Incluir arquivo de conexão ao banco de dados
require_once 'conexao.php';

// Recuperar preferências e gênero do usuário
$usuario_id = $_SESSION['id'];
$sql = "SELECT preferencias, genero FROM preferencias WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $preferencias = explode(',', $row['preferencias']);
    $genero = $row['genero'];
} else {
    // Se não houver preferências definidas, redirecionar para a página de configuração de preferências
    header("Location: guardaroupas.php");
    exit;
}

// Preparar a consulta SQL para buscar roupas com base nas preferências e gênero
$query = "SELECT * FROM roupas WHERE genero = ? AND categoria_id IN (" . implode(',', array_fill(0, count($preferencias), '?')) . ")";
$params = array_merge([$genero], $preferencias);
$types = str_repeat('i', count($preferencias));
$types = "s" . $types;
$stmt = $conn->prepare($query);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();
$roupas = $result->fetch_all(MYSQLI_ASSOC);

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
    <h1>Produtos Recomendados</h1>
    <div class="card-container">
        <?php
        foreach ($preferencias as $preferencia) {
            switch ($preferencia) {
                case '1': // Roupas Claras
                    if ($genero == 'masculino') {
                        echo '<div class="card">
                                <img src="imagens/recomendacao/claro/masc/roupa1.png" alt="Roupas Claras">
                                <h3>Bermuda Moletom Bege</h3>
                                <p>R$ 149,99</p>
                              </div>';
                    } elseif ($genero == 'feminino') {
                        echo '<div class="card">
                                <img src="imagens/recomendacao/claro/fem/roupa1.png" alt="Roupas Claras Femininas">
                                <h3>Vestido Claro</h3>
                                <p>R$ 159,99</p>
                              </div>';
                    }
                    break;
                case '2': // Roupas Escuras
                    if ($genero == 'masculino') {
                        echo '<div class="card">
                                <img src="imagens/recomendacao/escuro/masc/roupa2.png" alt="Roupas Escuras">
                                <h3>Jaqueta USA Azul</h3>
                                <p>R$ 249,99</p>
                              </div>';
                    } elseif ($genero == 'feminino') {
                        echo '<div class="card">
                                <img src="imagens/recomendacao/escuro/fem/roupa1.png" alt="Roupas Escuras Femininas">
                                <h3>Blusa Escura</h3>
                                <p>R$ 139,99</p>
                              </div>';
                    }
                    break;
                case '3': // Skate
                    if ($genero == 'masculino') {
                        echo '<div class="card">
                                <img src="imagens/recomendacao/skate/masc/roupa1.png" alt="Skate">
                                <h3>Camiseta Skate</h3>
                                <p>R$ 89,99</p>
                              </div>';
                    } elseif ($genero == 'feminino') {
                        echo '<div class="card">
                                <img src="imagens/recomendacao/skate/fem/roupa3.png" alt="Skate Feminino">
                                <h3>Shorts Skate</h3>
                                <p>R$ 79,99</p>
                              </div>';
                    }
                    break;
                case '4': // Casual
                    if ($genero == 'masculino') {
                        echo '<div class="card">
                                <img src="imagens/recomendacao/casual/masc/roupa1.png" alt="Casual">
                                <h3>Camisa Polo Branca</h3>
                                <p>R$ 99,99</p>
                              </div>';
                    } elseif ($genero == 'feminino') {
                        echo '<div class="card">
                                <img src="imagens/recomendacao/casual/fem/roupa1.png" alt="Casual Feminino">
                                <h3>Blusa Casual</h3>
                                <p>R$ 89,99</p>
                              </div>';
                    }
                    break;
                case '5': // Esportiva
                    if ($genero == 'masculino') {
                        echo '<div class="card">
                                <img src="imagens/recomendacao/esporte/masc/roupa2.png" alt="Esportiva">
                                <h3>Agasalho Esportivo</h3>
                                <p>R$ 199,99</p>
                              </div>';
                    } elseif ($genero == 'feminino') {
                        echo '<div class="card">
                                <img src="imagens/recomendacao/esporte/fem/roupa1.png" alt="Esportiva Feminina">
                                <h3>Leggings Esportivas</h3>
                                <p>R$ 119,99</p>
                              </div>';
                    }
                    break;
            }
        }
        ?>
        <div class="edit-preferences">
            <a href="guardaroupas.php?editar=true" class="edit-button">Editar Preferências</a>
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
