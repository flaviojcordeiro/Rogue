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
    <?php if (isset($_SESSION['nome'])): ?>
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
                    <li class="config"><a href="editar_usuario.php"><img src="imagens/config.png" alt="config"></a></li>
                    <li class="logo"><a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a></li>
                </ul>
            </div>
            <div class="nav-items-mini">
                <ul>
                    <li><a href="adicionarCategoria.php">adicionar categoria de roupa</a></li>
                    <li><a href="adicionarEstoque.php">adicionar ao estoque</a></li>
                    <li><a href="index.php">home</a></li>
                    <li><a href="guardaroupas.php">guarda-roupa</a></li>
                    <li><a href="homem.php">masculino</a></li>
                    <li><a href="mulher.php">feminino</a></li>
                    <li><a href="quemsomos.php">quem somos</a></li>
                    <li class="carrinho"><a href="carrinho.php"><img src="imagens/carrinho.png" alt="carrinho"></a></li>
                    <li class="config"><a href="editar_usuario.php"><img src="imagens/config.png" alt="config"></a></li>
                    <li class="logo"><a href="logout.php"><img src="imagens/logouticon.png" alt="logout"></a></li>
                </ul>
            </div>
            <div class="user-welcome">Bem vindo, <?php echo $_SESSION['nome']; ?> </div>
            <div class="action-button">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>
    <?php else: ?>
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
                    <li class="carrinho"><a href="login.php"><img src="imagens/loginicon.png" alt="logout"></a></li>
                </ul>
            </div>
            <div class="nav-items-mini">
                <ul>
                    <li><a href="adicionarCategoria.php">adicionar categoria de roupa</a></li>
                    <li><a href="adicionarEstoque.php">adicionar ao estoque</a></li>
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
    <?php endif; ?>
</head>

<body>
    <section class="adicionar-titulo">
        <h1>Editar item</h1>
    </section>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $hostname = "localhost:3306";
    $username = "root";
    $password = "PUC@1234";
    $database = "rogue";

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $nome = '';
    $descricao = '';
    $categoria_id = '';
    $genero = '';
    $preco = '';
    $foto = '';
    $quantidade_estoque = '';

    if ($id) {
        $sql = "SELECT * FROM roupas WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $nome = $row['nome'];
            $descricao = $row['descricao'];
            $categoria_id = $row['categoria_id'];
            $genero = $row['genero'];
            $preco = $row['preco'];
            $foto = $row['foto'];
            $quantidade_estoque = $row['quantidade_estoque'];
        }
        mysqli_stmt_close($stmt);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id = $_POST['id'];

        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
        $categoria_id = isset($_POST['categoria_id']) ? $_POST['categoria_id'] : '';
        $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
        $preco = isset($_POST['preco']) ? $_POST['preco'] : '';
        $foto = isset($_POST['foto']) ? $_POST['foto'] : '';
        $quantidade_estoque = isset($_POST['quantidade_estoque']) ? $_POST['quantidade_estoque'] : '';


        $update_roupa_sql = "UPDATE roupas SET nome=?, descricao=?, categoria_id=?, genero=?, preco=?, foto=?, quantidade_estoque=? WHERE id=?";
        $update_roupa_stmt = mysqli_prepare($conn, $update_roupa_sql);

        mysqli_stmt_bind_param($update_roupa_stmt, "sssssssi", $nome, $descricao, $categoria_id, $genero, $preco, $foto, $quantidade_estoque, $id);

        if (mysqli_stmt_execute($update_roupa_stmt)) {
            echo "<h1 id=centralizarmensagemsucesso>Roupa atualizada com sucesso!</h1>";
        } else {
            echo "<p>Erro executando UPDATE: " . mysqli_error($conn) . "</p>";
        }

        mysqli_stmt_close($update_roupa_stmt);
        mysqli_close($conn);
    }
    ?>

    <section class='form-adicionar-estoque'>
        <form class="form-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label><b>ID</b></label>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input class="input-field" name="id_display" type="text" value="<?php echo $id; ?>" disabled>

            <label><b>Nome</b></label>
            <input class="input-field" name="nome" type="text" value="<?php echo $nome; ?>" required>

            <label><b>Descrição</b></label>
            <input class="input-field" name="descricao" type="text" value="<?php echo $descricao; ?>" required>

            <label><b>Categoria ID</b></label>
            <input class="input-field" name="categoria_id" type="number" value="<?php echo $categoria_id; ?>" required>

            <label><b>Gênero</b></label>
            <input class="input-field" name="genero" type="text" value="<?php echo $genero; ?>" required>

            <label><b>Preço</b></label>
            <input class="input-field" name="preco" type="number" step="0.01" min="0" value="<?php echo $preco; ?>"
                required>

            <label><b>Foto (insira a url da foto)</b></label>
            <input class="input-field" name="foto" type="text" value="<?php echo $foto; ?>" required>

            <label><b>Quantidade em Estoque</b></label>
            <input class="input-field" name="quantidade_estoque" type="number" min="0"
                value="<?php echo $quantidade_estoque; ?>" required>

            <p>
                <input type="submit" value="Editar Roupa" class="submit-btn">
                <input type="button" value="Cancelar" class="cancel-btn" onclick="window.location.href='adminreg.php'">
            </p>
        </form>
    </section>
</body>
<script src="script.js"></script>
</html>