<?php
if (isset($_GET['error']) && $_GET['error'] == 'invalid_birthdate') {
    echo "<script>document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('errorMessage').textContent = 'Data de nascimento inválida.';
        showModal();
    });</script>";
}
if (isset($_GET['error']) && $_GET['error'] == 'duplicate_cpf') {
    echo "<script>document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('errorMessage').textContent = 'CPF já cadastrado. Por favor, use um CPF diferente.';
        showModal();
    });</script>";
}
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
    </section>

    <script>
    function mascaraCpf(campo) {
        campo.value = campo.value.replace(/\D/g, '');
        campo.value = campo.value.replace(/^(\d{3})(\d)/, '$1.$2');
        campo.value = campo.value.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3'); 
        campo.value = campo.value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4'); 
    }

    window.onload = function() {
    var error = "<?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?>";
    if (error) {
        document.getElementById('errorMessage').textContent = error;
        showModal();
        <?php unset($_SESSION['error']); ?>
    }
    };

    function showModal() {
        document.getElementById('errorModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('errorModal').style.display = 'none';
        window.history.back();
    }
</script>
</head>

<body bgcolor="FFFEF8">
    <div class="cadastro-container">
        <h2>Cadastro</h2>
        <form action="auth_cadastro.php" method="post">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="nome"required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"required><br>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" oninput="mascaraCpf(this)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite um CPF válido (formato: 111.111.111-11)" maxlength="14" required><br>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required><br>
            <label for="birthdate">Data de Nascimento:</label>
            <input type="date" id="birthdate" name="data_nascimento" required><br>
            <label for="password">Senha:</label>
            <input type="password" id="senha" name="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}" title="A senha deve conter pelo menos um número, uma letra maiúscula, uma letra minúscula, um caractere especial ($, *, &, @ ou #) e ter no mínimo 8 caracteres" required><br><br>
            <input type="submit" value="Cadastrar">
        </form>
        <p>Já possui uma conta? Faça <a href="login.php">login</a>.</p>
    </div>

    <div id="errorModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p id="errorMessage"></p>
    </div>
</div>
</body>

</html>
