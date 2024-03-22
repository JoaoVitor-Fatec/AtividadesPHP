<?php

    $host = "localhost";
    $bd = "banco_php";
    $user = "root";
    $senha = "";

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $senha);
        echo "A conexão foi concedida!";
    } catch (PDOException $e){
        echo "Erro:". $e->getMessage();
    }