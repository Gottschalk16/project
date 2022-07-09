<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include_once 'ClassConexao.php';

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);
  $query_grupoproduto = "UPDATE grupoproduto SET 
                      idsubgrupo=:idsubgrupo,
                      ativo=:ativo,
                      descricao=:descricao
                      WHERE id=:id";

  $edit_grupoproduto = $conn->prepare($query_grupoproduto);

  $edit_grupoproduto->bindParam(':ativo', $dados['ativo'], PDO::PARAM_INT);
  $edit_grupoproduto->bindParam(':idsubgrupo', $dados['idsubgrupo'], PDO::PARAM_INT);
  $edit_grupoproduto->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
  $edit_grupoproduto->bindParam('id', $dados['id'], PDO::PARAM_INT);

  $edit_grupoproduto->execute();

  if($edit_grupoproduto->rowCount()){
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
