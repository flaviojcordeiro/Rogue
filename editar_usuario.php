<?php
session_start(); // Inicie a sessão para acessar os dados do usuário

// Verifique se o usuário está logado
if (!isset($_SESSION['nome'])) {
    header("Location: login.php"); // Redireciona para a página de login se não estiver logado
    exit(); // Encerra o script
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Editar Informações</title>
</head>

<body bgcolor="FFFEF8">
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
                    <li><a href="editar_usuario.php">editar informações</a></li>
                    <li class="logo">
                        <span><?php echo $_SESSION['nome']; ?></span>
                        <a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a>
                    </li>
                </ul>
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
        </nav>
    <?php endif; ?>
    <div class="cadastro-container">
        <h2>Editar Informações</h2>
        <form action="processar_edicao.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : ''; ?>"><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"><br>
            
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" value="<?php echo isset($_SESSION['endereco']) ? $_SESSION['endereco'] : ''; ?>"><br>

            <label for="nova_senha">Nova Senha:</label>
            <input type="password" id="nova_senha" name="nova_senha"><br>
            
            <label for="confirma_senha">Confirmar Nova Senha:</label>
            <input type="password" id="confirma_senha" name="confirma_senha"><br>
            
            <input type="submit" value="Salvar Alterações">
        </form>

        <form action="processar_excluir_conta.php" method="post">
        <input type="submit" value="Excluir Conta" onclick="return confirm('Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita.')">
    </form>
    </div>
</body>

</html>
