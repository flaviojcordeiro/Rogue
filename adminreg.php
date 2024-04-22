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
                <li><a href="adicionarCategoria.php">adicionar categoria de roupa</a></li>
                <li><a href="adicionarEstoque.php">adicionar ao estoque</a></li>
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
    <section class="title-admin">
        <h1>Gerenciamento de estoque</h1>
    </section>
    <section class="container">
        <div class="w3-responsive w3-card-4" style="width: 100%;">
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th class="table-header text-center" style="width: 20%; padding: 20px;">ID</th>
                        <th class="table-header text-center" style="width: 20%; padding: 20px;">Nome</th>
                        <th class="table-header text-center" style="width: 20%; padding: 20px;">Descrição</th>
                        <th class="table-header text-center" style="width: 20%; padding: 20px;">Categoria ID</th>
                        <th class="table-header text-center" style="width: 20%; padding: 20px;">Gênero</th>
                        <th class="table-header text-center" style="width: 20%; padding: 20px;">Preço</th>
                        <th class="table-header text-center" style="width: 20%; padding: 20px;">Quantidade em Estoque
                        </th>
                        <th class="table-header text-center" style="width: 20%; padding: 20px;">Ação</th>
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

                    if ($conn->connect_error) {
                        die("Falha na conexão com o Banco de Dados: " . $conn->connect_error);
                    }

                    $sql = "SELECT id, nome, descricao, categoria_id, genero, foto, preco, quantidade_estoque FROM roupas";

                    if ($result = $conn->query($sql)) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='text-center'>". $row["id"]. "</td>";
                                echo "<td class='text-center'>". $row["nome"]. "</td>";
                                echo "<td class='text-center'>". $row["descricao"]. "</td>";
                                echo "<td class='text-center'>". $row["categoria_id"]. "</td>";
                                echo "<td class='text-center'>". $row["genero"]. "</td>";
                                echo "<td class='text-center'>". $row["preco"]. "</td>";
                                echo "<td class='text-center'>". $row["quantidade_estoque"]. "</td>";
                                echo "<td class='text-center'>";
                                echo "<a href='editarestoque.php?id=". $row["id"]. "'><i class='fas fa-edit'></i></a>";
                                echo "<a href='excluirestoque.php?id=". $row["id"]. "'><i class='fas fa-trash-alt'></i></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>0 resultados</td></tr>";
                        }

                        $result->free();
                    } else {
                        echo "<tr><td colspan='9'>Erro na execução da consulta: " . $conn->error . "</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>