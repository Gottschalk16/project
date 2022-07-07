<?php
$servidor = "localhost";
$usuario = "root";
$port = "3302";
$senha = "";
$dbname = "projeto";

  $conn = new PDO("mysql:host=$servidor;port=$port;dbname=" . $dbname, $usuario, $senha);
?>