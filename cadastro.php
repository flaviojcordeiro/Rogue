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
    <section class="nav">
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
                    <li class="logo"><a href="login.php"><img src="imagens/loginicon.png" alt="logo"></a></li>
                </ul>
            </div>
        </nav>
    </section>
</head>

<body bgcolor="FFFEF8">
    <div class="cadastro-container">
        <h2>Cadastro</h2>
        <form action="auth_cadastro.php" method="post">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="nome"><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf"><br>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco"><br>
            <label for="birthdate">Data de Nascimento:</label>
            <input type="date" id="birthdate" name="data_nascimento"><br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="senha"><br><br>
            <input type="submit" value="Cadastrar">
        </form>
        <p>Já possui uma conta? Faça <a href="login.php">login</a>.</p>
    </div>
</body>

</html>
