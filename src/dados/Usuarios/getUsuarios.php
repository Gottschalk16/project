<?php

include_once 'ClassConexao.php';

$query_usuarios = "SELECT id, ativo, usuario, senha FROM usuario ORDER BY id ASC";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios-> execute();

if(($result_usuarios) AND ($result_usuarios->rowCount() != 0)){
  while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
    var_dump($row_usuario);
  }
}
?>