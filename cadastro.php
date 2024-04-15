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
    <div class="cadastro-container">
        <h2>Cadastro</h2>
        <form action="req/auth_cadastro.php" method="post">
        <label for="name">Nome:</label>
            <input type="text" id="name" name="name"><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br>
            <label for="birthdate">Data de Nascimento:</label>
            <input type="date" id="birthdate" name="birthdate"><br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Cadastrar">
        </form>
        <p>Já possui uma conta? Faça <a href="login.php">login</a>.</p>
    </div>
</body>

</html>
