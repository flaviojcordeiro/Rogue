<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $conn = new mysqli('localhost:3306', 'root', 'PUC@1234', 'rogue');

        if ($conn->connect_error) {
            die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT id, nome, email, senha, is_admin FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $stored_password = $row['senha'];

            if (password_verify($senha, $stored_password)) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['is_admin'] = $row['is_admin'];

                if ($row['is_admin'] == 1) {
                    header("Location: adminreg.php");
                } elseif ($row['is_admin'] == 2) {
                    header("Location: atendente.php");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                header("Location: login.php?error=incorrect");
            }
        } else {
            header("Location: login.php?error=incorrect");
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>
