<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === 'usuario' && $password === 'senha') {
           
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit();
        } else {
            echo "Usuário ou senha inválidos.";
        }
    } else {    
        echo "Por favor, preencha todos os campos.";
    }
}
?>
