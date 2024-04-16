<?php

$hostname = "localhost";
$username = "root"; 
$password = "PUC@1234"; 
$database = "rogue";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
else{
    echo "Conexão bem-sucedida!";
}
