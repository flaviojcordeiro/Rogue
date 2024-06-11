<?php
session_start();

if (!isset($_SESSION['nome'])) {
    http_response_code(403);
    exit("Você não está logado");
}

if (!isset($_POST['id_roupa']) || !isset($_POST['favorite'])) {
    http_response_code(400);
    exit("Parâmetros incompletos");
}

$hostname = "localhost:3306";
$username = "root"; 
$password = "PUC@1234"; 
$database = "rogue";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$id_roupa = $_POST['id_roupa'];
$is_favorite = $_POST['favorite'] === '1' ? true : false;
$id_usuario = $_SESSION['id']; 

if ($is_favorite) {
    $sql = "INSERT INTO favoritos (id_usuario, id_roupa) VALUES ($id_usuario, $id_roupa)";
} else {
    $sql = "DELETE FROM favoritos WHERE id_usuario = $id_usuario AND id_roupa = $id_roupa";
}

if ($conn->query($sql) === TRUE) {
    http_response_code(200);
    echo "Favoritos atualizados com sucesso";
} else {
    http_response_code(500);
    echo "Erro ao atualizar favoritos: " . $conn->error;
}

$conn->close();
