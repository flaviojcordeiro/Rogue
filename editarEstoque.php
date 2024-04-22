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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>rogue</title>
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
                <li class="logo">
                    <span><?php echo $_SESSION['nome']; ?></span>
                    <a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a>
                </li>
            </ul>
        </div>
    </nav>
</head>

</html>