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
                <li class="logo">
                    <span><?php echo $_SESSION['nome']; ?></span>
                    <a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a>
                </li>
            </ul>
        </div>
    </nav>
</head>

<body>
    <section class="container">
        <div class="table">
            <div class="table-header">
                <div class="header__item"><a id="id" class="filter__link" href="#">ID</a></div>
                <div class="header__item"><a id="nome" class="filter__link" href="#">Nome</a></div>
                <div class="header__item"><a id="descricao" class="filter__link" href="#">Descrição</a></div>
                <div class="header__item"><a id="categoria_id" class="filter__link" href="#">Categoria ID</a></div>
                <div class="header__item"><a id="genero" class="filter__link" href="#">Gênero</a></div>
                <div class="header__item"><a id="foto" class="filter__link" href="#">Foto</a></div>
                <div class="header__item"><a id="preco" class="filter__link" href="#">Preço</a></div>
                <div class="header__item"><a id="quantidade_estoque" class="filter__link" href="#">Quantidade em
                        Estoque</a></div>
            </div>
            <div class="table-content">
                <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                $hostname = "localhost:3306";
                $username = "root";
                $password = "PUC@1234";
                $database = "rogue";

                $conn = new mysqli($hostname, $username, $password, $database);

                // Verifica conexão
                if ($conn->connect_error) {
                    die("Falha na conexão com o Banco de Dados: " . $conn->connect_error);
                }

                // Faz Select na Base de Dados
                $sql = "SELECT id, nome, descricao, categoria_id, genero, foto, preco, quantidade_estoque FROM roupas";

                if ($result = $conn->query($sql)) {
                    if ($result->num_rows > 0) {
                        // Apresenta cada linha da tabela
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='table-row'>";
                            echo "<div class='table-data'>" . $row["id"] . "</div>";
                            echo "<div class='table-data'>" . $row["nome"] . "</div>";
                            echo "<div class='table-data'>" . $row["descricao"] . "</div>";
                            echo "<div class='table-data'>" . $row["categoria_id"] . "</div>";
                            echo "<div class='table-data'>" . $row["genero"] . "</div>";
                            echo "<div class='table-data'>" . $row["foto"] . "</div>";
                            echo "<div class='table-data'>" . $row["preco"] . "</div>";
                            echo "<div class='table-data'>" . $row["quantidade_estoque"] . "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='table-row'><div class='table-data' colspan='8'>0 resultados</div></div>";
                    }

                    $result->free();
                } else {
                    echo "Erro na execução da consulta: " . $conn->error;
                }

                // Fecha a conexão
                $conn->close();
                ?>
            </div>
        </div>
    </section>
</body>

</html>