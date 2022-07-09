<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include_once 'ClassConexao.php';

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);
  $query_subgrupoproduto = "UPDATE subgrupoproduto SET 
                      ativo=:ativo,
                      descricao=:descricao
                      WHERE id=:id";

  $edit_subgrupoproduto = $conn->prepare($query_usuario);

  $edit_subgrupoproduto->bindParam(':ativo', $dados['ativo'], PDO::PARAM_INT);
  $edit_subgrupoproduto->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
  $edit_subgrupoproduto->bindParam('id', $dados['id'], PDO::PARAM_INT);

  $edit_subgrupoproduto->execute();

  if($edit_subgrupoproduto->rowCount()){
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
