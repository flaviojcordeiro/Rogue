<?php
session_start();
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
                    <span><?php echo $_SESSION['nome']; ?></span>
                    <a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a>
                </li>
            </ul>
        </div>
    </nav>
</head>

<body>
    <section class="adicionar-titulo">
        <h1>Excluir do estoque</h1>
    </section>
    <section class="phpconnection">
        <?php

        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        // Verifica se o id foi recebido via GET
        if (isset($_GET['id'])) {
            // Obtém o id da roupa a ser excluída
            $id = $_GET['id'];

            $hostname = "localhost:3306";
            $username = "root";
            $password = "PUC@1234";
            $database = "rogue";

            // Cria conexão
            $conn = mysqli_connect($hostname, $username, $password, $database);

            // Verifica conexão
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Prepara a declaração SQL
            $delete_roupa_sql = "DELETE FROM roupas WHERE id =?";
            $delete_roupa_stmt = mysqli_prepare($conn, $delete_roupa_sql);

            // Vincula o parâmetro à declaração preparada
            mysqli_stmt_bind_param($delete_roupa_stmt, "i", $id);

            // Executa a declaração preparada
            if (mysqli_stmt_execute($delete_roupa_stmt)) {
                echo "<h1 id=centralizarmensagemsucesso>Roupa excluída com sucesso!</h1>";
            } else {
                echo "<p>Erro executando DELETE: " . mysqli_error($conn) . "</p>";
            }

            // Fecha a declaração preparada
            mysqli_stmt_close($delete_roupa_stmt);
            mysqli_close($conn);
        } else {
            echo "<p>ID não fornecido para exclusão.</p>";
            echo "<p>ID recebido: " . $id . "</p>";
        }
        ?>
    </section>
</body>

</html>