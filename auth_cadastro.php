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
    $cpf = trim($_POST['cpf']);
    $endereco = trim($_POST['endereco']);

    // Verificar se todos os campos estão preenchidos
    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($data_nascimento) && !empty($cpf) && !empty($endereco)) {

        $data_atual = date('Y-m-d');

        if ($data_nascimento >= $data_atual) {
            header("Location: cadastro.php?error=invalid_birthdate");
            exit;
        }

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, data_nascimento, cpf, endereco) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nome, $email, $senha_hash, $data_nascimento, $cpf, $endereco);

        try {
            $stmt->execute();
            header("Location: login.php?signin=correct");
            exit();
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) { // Código de erro para "Duplicate entry"
                header("Location: cadastro.php?error=duplicate_cpf");
            } else {
                echo "Erro ao cadastrar o usuário: " . $e->getMessage();
            }
            exit();
        }

    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

$conn->close();
