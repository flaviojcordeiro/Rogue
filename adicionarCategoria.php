<?php
session_start();
if ($_SESSION['is_admin'] != 1) {
    echo "
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Permissão Negada</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
            }
            .message-box {
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 20px;
                text-align: center;
            }
            .message-box h1 {
                margin: 0 0 10px;
                font-size: 24px;
                color: #333;
            }
            .message-box p {
                margin: 0 0 20px;
                color: #666;
            }
            .message-box a {
                display: inline-block;
                margin-top: 10px;
                padding: 10px 20px;
                color: #fff;
                background-color: #000000;
                text-decoration: none;
                border-radius: 5px;
            }
            .message-box a:hover {
                background-color: #333333;
            }
        </style>
    </head>
    <body>
        <div class='message-box'>
            <h1>Acesso Negado</h1>
            <p>Você não tem permissão para acessar esta página.</p>
            <a href='index.php'>Voltar para a página inicial</a>
        </div>
    </body>
    </html>";
    exit();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>rogue</title>
    <nav class="navbar">
        <div class="nav-items">
            <img src="imagens/roguelogobranca.png" id="logokkjk">
            <ul>
                <li><a href="adminreg.php">voltar</a></li>
                <li><a href="index.php">home</a></li>
                <li><a href="guardaroupas.php">guarda-roupa</a></li>
                <li><a href="homem.php">masculino</a></li>
                <li><a href="mulher.php">feminino</a></li>
                <li><a href="quemsomos.php">quem somos</a></li>
                <li class="carrinho"><a href="carrinho.php"><img src="imagens/carrinho.png" alt="carrinho"></a></li>
                <li class="logo">
                    <a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a>
                </li>
            </ul>
        </div>
    </nav>
</head>

<body>
    <section class="adicionar-titulo">
        <h1>Adicionar Categoria de Roupa</h1>
    </section>
    <section class="phpinserction">
        <?php

        
        $hostname = "localhost:3306";
        $username = "root";
        $password = "PUC@1234";
        $database = "rogue";

        // Cria conexão
        $conn = mysqli_connect($hostname, $username, $password, $database);


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $nome = $_POST['nome'];

            // Verifica conexão
            if (!$conn) {
                die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
            }

            // Faz INSERT na Base de Dados
            $sql = "INSERT INTO categorias_roupas (id, nome) 
                VALUES ('$id', '$nome')";

            if (mysqli_query($conn, $sql)) {
                echo "<h1 id=centralizarmensagemsucesso>Categoria adicionada com sucesso!</h1>";
                echo "</div>";
            } else {
                echo "<p>Erro ao adicionar categoria: " . mysqli_error($conn) . "</p>";
                echo "</div>";
            }

            // Fecha a conexão
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
        ?>
    </section>

    <section class='form-adicionar-estoque'>
        <form class="form-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label><b>ID</b></label>
            <input class="input-field" name="id" type="number" required>

            <label><b>Nome</b></label>
            <input class="input-field" name="nome" type="text" required>

            <p>
                <input type="submit" value="Adicionar Categoria" class="submit-btn">
                <input type="button" value="Cancelar" class="cancel-btn" onclick="window.location.href='adminreg.php'">
            </p>
        </form>
    </section>
</body>

</html>