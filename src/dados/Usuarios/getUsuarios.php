<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json. charset=UTF-8");
include_once 'ClassConexao.php';

$query_usuarios = "SELECT id, ativo, usuario, senha FROM usuario ORDER BY id ASC";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios-> execute();

if(($result_usuarios) AND ($result_usuarios->rowCount() != 0)){
  while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
    extract($row_usuario);

    $lista_usuarios["records"][$usuario] = [
      'id' => $id,
      'ativo' => $ativo,
      'usuario' => $usuario,
      'senha' => $senha
    ];
    http_response_code(200);

    echo json_encode($lista_usuarios);
  }
}
?>