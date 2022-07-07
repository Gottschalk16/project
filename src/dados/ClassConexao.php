<?php
  $servidor = "localhost";
  $usuario = "root";
  $port = "33002";
  $senha = "1622001a";
  $dbname = "db";

  $conn = new PDO("mysql:host=$servidor;port=$port;dbname=" . $dbname, $usuario, $senha);
?>