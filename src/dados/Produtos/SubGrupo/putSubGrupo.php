<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include_once 'ClassConexao.php';

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);
  $query_usuario = "UPDATE subgrupoproduto SET 
                      ativo=:ativo,
                      descricao=:descricao
                      WHERE id=:id";

  $edit_usuario = $conn->prepare($query_usuario);

  $edit_usuario->bindParam(':ativo', $dados['ativo'], PDO::PARAM_INT);
  $edit_usuario->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
  $edit_usuario->bindParam('id', $dados['id'], PDO::PARAM_INT);

  $edit_usuario->execute();

  if($edit_usuario->rowCount()){
    $response = [
      "erro" => false,
      "mensagem" => "alterou!"
    ];
  }else{
    $response = [
      "erro" => false,
      "mensagem" => "Não alterou!"
    ];
  }

http_response_code(200);
echo json_encode($response);
