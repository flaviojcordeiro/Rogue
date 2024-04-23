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
        <h1>Editar item</h1>
    </section>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $hostname = "localhost:3306";
    $username = "root";
    $password = "PUC@1234";
    $database = "rogue";

    // Cria conexao
    $conn = mysqli_connect($hostname, $username, $password, $database);

    // Checa conexao
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
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

        // Prepara o codigo sql para update
        $update_roupa_sql = "UPDATE roupas SET nome=?, descricao=?, categoria_id=?, genero=?, preco=?, foto=? quantidade_estoque=? WHERE id=?";
        $update_roupa_stmt = mysqli_prepare($conn, $update_roupa_sql);

        mysqli_stmt_bind_param($update_roupa_stmt, "sssssssi", $nome, $descricao, $categoria_id, $genero, $preco, $foto, $quantidade_estoque, $id);

        // Executa o statement com os valores
        if (mysqli_stmt_execute($update_roupa_stmt)) {
            echo "<h1 id=centralizarmensagemsucesso>Roupa atualizada com sucesso!</h1>";
        } else {
            echo "<p>Erro executando UPDATE: " . mysqli_error($conn) . "</p>";
        }

        // Fecha o statement
        mysqli_stmt_close($update_roupa_stmt);
        mysqli_close($conn);
    } else {
        ;
    }
    ?>

    <section class='form-adicionar-estoque'>
        <form class="form-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label><b>ID</b></label>
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
            <input class="input-field" name="id_display" type="text"
                value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" disabled>

            <label><b>Nome</b></label>
            <input class="input-field" name="nome" type="text" required>

            <label><b>Descrição</b></label>
            <input class="input-field" name="descricao" type="text" required>

            <label><b>Categoria ID</b></label>
            <input class="input-field" name="categoria_id" type="number" required>

            <label><b>Gênero</b></label>
            <input class="input-field" name="genero" type="text" required>

            <label><b>Preço</b></label>
            <input class="input-field" name="preco" type="number" step="0.01" min="0" required>

            <label><b>Foto(insira a url da foto)</b></label>
            <input class="input-field" name="foto" type="text" required>

            <label><b>Quantidade em Estoque</b></label>
            <input class="input-field" name="quantidade_estoque" type="number" min="0" required>

            <p>
                <input type="submit" value="Editar Roupa" class="submit-btn">
                <input type="button" value="Cancelar" class="cancel-btn" onclick="window.location.href='adminreg.php'">
            </p>
        </form>
    </section>
</body>

</html>