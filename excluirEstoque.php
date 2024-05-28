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

            // Inicia a transação
            mysqli_begin_transaction($conn);

            try {
                // Remove referências na tabela historico_pedidos
                $sql_historico = "DELETE FROM historico_pedidos WHERE produto_id = ?";
                $stmt_historico = mysqli_prepare($conn, $sql_historico);
                mysqli_stmt_bind_param($stmt_historico, "i", $id);
                mysqli_stmt_execute($stmt_historico);

                // Remove referências na tabela roupas_likes
                $sql_likes = "DELETE FROM roupas_likes WHERE roupa_id = ?";
                $stmt_likes = mysqli_prepare($conn, $sql_likes);
                mysqli_stmt_bind_param($stmt_likes, "i", $id);
                mysqli_stmt_execute($stmt_likes);

                // Remove referências na tabela carrinho
                $sql_carrinho = "DELETE FROM carrinho WHERE produto_id = ?";
                $stmt_carrinho = mysqli_prepare($conn, $sql_carrinho);
                mysqli_stmt_bind_param($stmt_carrinho, "i", $id);
                mysqli_stmt_execute($stmt_carrinho);

                // Remove a roupa da tabela roupas
                $sql_roupa = "DELETE FROM roupas WHERE id = ?";
                $stmt_roupa = mysqli_prepare($conn, $sql_roupa);
                mysqli_stmt_bind_param($stmt_roupa, "i", $id);
                mysqli_stmt_execute($stmt_roupa);

                // Commita a transação
                mysqli_commit($conn);

                echo "<h1 id='centralizarmensagemsucesso'>Roupa excluída com sucesso!</h1>";
            } catch (Exception $e) {
                // Rollback em caso de erro
                mysqli_rollback($conn);
                echo "<p>Erro ao excluir roupa: " . $e->getMessage() . "</p>";
            }

            // Fecha as declarações preparadas
            mysqli_stmt_close($stmt_historico);
            mysqli_stmt_close($stmt_likes);
            mysqli_stmt_close($stmt_carrinho);
            mysqli_stmt_close($stmt_roupa);

            // Fecha a conexão
            mysqli_close($conn);
        } else {
            echo "<p>ID não fornecido para exclusão.</p>";
        }
        ?>
    </section>
</body>

</html>
