<?php

// cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// verifica conexão
if (!$conn) {
    echo "</table>";
    echo "</div>";
    die("Falha na conexão com o Banco de Dados: " . mysqli_connect_error());
}

// configura para trabalhar com caracteres acentuados do português
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

// faz Select na Base de Dados
$sql = "SELECT id, nome, descricao, categoria_id, genero, foto, preco, quantidade_estoque FROM roupas";
echo "<div class='w3-responsive w3-card-4'>";
if ($result = mysqli_query($conn, $sql)) {
    echo "<table class='w3-table-all'>";
    echo "	<tr>";
    echo "	  <th width='20%'>id</th>";
    echo "	  <th width='20%'>nome</th>";
    echo "	  <th width='20%'>descricao</th>";
    echo "	  <th width='20%'>categoria_id</th>";
    echo "	  <th width='20%'>genero</th>";
    echo "	  <th width='20%'>foto</th>";
    echo "	  <th width='20%'>preco</th>";
    echo "	  <th width='20%'>quantidade_estoque</th>";
    echo "	</tr>";
    if (mysqli_num_rows($result) > 0) {
        // apresenta cada linha da tabela
        while ($row = mysqli_fetch_assoc($result)) {
            $cod = $row["id"];
            echo "<tr>";
            echo "<td>";
            echo $cod;
            echo "</td><td>";
            echo $row["nome"];
            echo "</td><td>";
            echo $row["descricao"];
            echo "</td><td>";
            echo $row["categoria_id"];
            echo "</td><td>";
            echo $row["genero"];
            echo "</td><td>";
            echo $row["foto"];
            echo "</td><td>";
            echo $row["preco"];
            echo "</td><td>";
            echo $row["quantidade em estoque"];
            echo "</td><td>";
            echo "</tr>";
        }
    } else {
        echo "0 resultados";
    }
    echo "</table>";
    echo "</div>";
    mysqli_free_result($result);
} else {
    echo "Erro na execução da consulta: " . mysqli_error($conn);
}

// Fecha a conexão
mysqli_close($conn);
?>