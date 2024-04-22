<?php
session_start(); // Inicie a sessão para acessar os dados do usuário

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se o usuário está logado
    if (!isset($_SESSION['nome'])) {
        header("Location: login.php"); // Redireciona para a página de login se não estiver logado
        exit(); // Encerra o script
    }

    // Recupere os dados do formulário
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $endereco = trim($_POST['endereco']);
    $nova_senha = $_POST['nova_senha'];
    $confirma_senha = $_POST['confirma_senha'];

    // Valide os dados conforme necessário
    if (!empty($nova_senha) && $nova_senha === $confirma_senha) {
        // A senha foi alterada e a confirmação coincide
        // Hash da nova senha
        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

        // Atualize a senha na sessão
        $_SESSION['senha'] = $senha_hash;
    }

    // Atualize os demais dados na sessão
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['endereco'] = $endereco;

    // Redirecione de volta para a página de edição com uma mensagem de sucesso, se necessário
    header("Location: editar_usuario.php");
    exit();
}
?>
