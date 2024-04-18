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
        <div class="w3-responsive w3-card-4">
            <table class="w3-table-all">
                <thead>
                    <tr class="table-header">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Categoria ID</th>
                        <th>Gênero</th>
                        <th>Foto</th>
                        <th>Preço</th>
                        <th>Quantidade em Estoque</th>
                    </tr>
                </thead>
                <tbody>
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
                                echo "<tr class='table-row'>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["nome"] . "</td>";
                                echo "<td>" . $row["descricao"] . "</td>";
                                echo "<td>" . $row["categoria_id"] . "</td>";
                                echo "<td>" . $row["genero"] . "</td>";
                                echo "<td>" . $row["foto"] . "</td>";
                                echo "<td>" . $row["preco"] . "</td>";
                                echo "<td>" . $row["quantidade_estoque"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>0 resultados</td></tr>";
                        }

                        $result->free();
                    } else {
                        echo "<tr><td colspan='8'>Erro na execução da consulta: " . $conn->error . "</td></tr>";
                    }

                    // Fecha a conexão
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>