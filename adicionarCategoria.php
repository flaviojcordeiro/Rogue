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
                    <span><?php echo $_SESSION['nome']; ?></span>
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
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

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