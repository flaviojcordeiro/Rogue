<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $conn = new mysqli('localhost', 'root', '', 'rogue');

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
                // Login bem-sucedido
                $_SESSION['id'] = $row['id'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['is_admin'] = $row['is_admin'];

                // Redirecionar para a página de perfil ou dashboard, dependendo se é um administrador ou usuário comum
                if ($row['is_admin']) {
                    header("Location: adminreg.php");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                echo "Senha incorreta. Tente novamente.";
            }
        } else {
            echo "Nenhum usuário encontrado com o e-mail fornecido.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>

