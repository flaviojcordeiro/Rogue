<?php

$hostname = "localhost";
$username = "root"; 
$password = ""; 
$database = "rogue";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
else{
    echo "Conexão bem-sucedida!";
}
