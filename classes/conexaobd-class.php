<?php
$base = "oauth";
$host = "localhost";
$user = "root";
$pass = "1234";

try {
    $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO("mysql:dbname=".$base.";host=".$host, $user, $pass, $opcoes);
} catch (PDOException $i) {
    die("Erro: <code>" . $i->getMessage() ."</code>");
}