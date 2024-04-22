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

        // Validar a data de nascimento
        $data_atual = date('Y-m-d');
        if ($data_nascimento >= $data_atual) {
            echo "Data de nascimento inválida.";
            exit();
        }

        if (!preg_match("/^[0-9]{3}\.[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}$/", $cpf)) {
            echo "CPF inválido.";
            exit();
        }
        

        if (empty($endereco)) {
            echo "Endereço inválido.";
            exit();
        }

        if (strlen($senha) < 8) {
            echo "Senha deve ter no mínimo 8 caracteres.";
            exit();
        }

        // Hash da senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        if ($conn->connect_error) {
            die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, data_nascimento, cpf, endereco) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nome, $email, $senha_hash, $data_nascimento, $cpf, $endereco);

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
