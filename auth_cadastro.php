<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

    $hostname = "localhost:3306";
    $username = "root"; 
    $password = "PUC@1234"; 
    $database = "rogue";

    $conn = new mysqli($hostname, $username, $password, $database);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $data_nascimento = trim($_POST['data_nascimento']);

    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($data_nascimento)) {
        // Hash da senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        if ($conn->connect_error) {
            die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, data_nascimento) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $senha_hash, $data_nascimento);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            echo "Erro ao cadastrar o usuário: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>
