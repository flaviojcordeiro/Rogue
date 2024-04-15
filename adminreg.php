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
</head>

<body>
    <?php

    // cria conexão
    $conn = mysqli_connect($servername, $username, $password, $database);

    // verifica conexão
    if (!$conn) {
        echo "</table>";
        echo "</div>";
        die("Falha na conexão com o Banco de Dados: " . mysqli_connect_error());
    }

    // configura para trabalhar com caracteres acentuados do português
    mysqli_query($conn, "SET NAMES 'utf8'");
    mysqli_query($conn, 'SET character_set_connection=utf8');
    mysqli_query($conn, 'SET character_set_client=utf8');
    mysqli_query($conn, 'SET character_set_results=utf8');

    // faz Select na Base de Dados
    $sql = "SELECT id, nome, descricao, categoria_id, genero, foto, preco, quantidade_estoque FROM roupas";
    echo "<div class='w3-responsive w3-card-4'>";
    if ($result = mysqli_query($conn, $sql)) {
        echo "<table class='w3-table-all'>";
        echo "	<tr>";
        echo "	  <th width='20%'>id</th>";
        echo "	  <th width='20%'>nome</th>";
        echo "	  <th width='20%'>descricao</th>";
        echo "	  <th width='20%'>categoria_id</th>";
        echo "	  <th width='20%'>genero</th>";
        echo "	  <th width='20%'>foto</th>";
        echo "	  <th width='20%'>preco</th>";
        echo "	  <th width='20%'>quantidade_estoque</th>";
        echo "	</tr>";
        if (mysqli_num_rows($result) > 0) {
            // apresenta cada linha da tabela
            while ($row = mysqli_fetch_assoc($result)) {
                $cod = $row["id"];
                echo "<tr>";
                echo "<td>";
                echo $cod;
                echo "</td><td>";
                echo $row["nome"];
                echo "</td><td>";
                echo $row["descricao"];
                echo "</td><td>";
                echo $row["categoria_id"];
                echo "</td><td>";
                echo $row["genero"];
                echo "</td><td>";
                echo $row["foto"];
                echo "</td><td>";
                echo $row["preco"];
                echo "</td><td>";
                echo $row["quantidade em estoque"];
                echo "</td><td>";
                echo "</tr>";
            }
        } else {
            echo "0 resultados";
        }
        echo "</table>";
        echo "</div>";
        mysqli_free_result($result);
    } else {
        echo "Erro na execução da consulta: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
    ?>

</body>

</html>