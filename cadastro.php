<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ojuju:wght@500&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Reddit+Mono:wght@300&display=swap" rel="stylesheet">
    <title>rogue</title>
    <section class="nav">
        <nav class="navbar">
            <div class="nav-items">
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
    </section>
</head>

<body bgcolor="FFFEF8">
    <div class="cadastro-container">
        <h2>Cadastro</h2>
        <form action="req/auth_cadastro.php" method="post">
        <label for="name">Nome:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="birthdate">Data de Nascimento:</label><br>
            <input type="date" id="birthdate" name="birthdate"><br>
            <label for="password">Senha:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Cadastrar">
        </form>
        <p>Já possui uma conta? Faça <a href="login.php">login</a>.</p>
    </div>
</body>

</html>
