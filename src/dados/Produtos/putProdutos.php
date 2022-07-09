<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include_once 'ClassConexao.php';

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);
  $query_produto = "UPDATE produto SET 
                      ativo=:ativo,
                      idgrupo=:idgrupo,
                      idsubgrupo=:idsubgrupo,
                      preco=:preco,
                      quantidade=:quantidade, 
                      nome=:nome WHERE id=:id";
  
  $edit_produto = $conn->prepare($query_produto);

  $edit_produto->bindParam(':ativo', $dados['ativo'], PDO::PARAM_INT);
  $edit_produto->bindParam(':idgrupo', $dados['idgrupo'], PDO::PARAM_INT);
  $edit_produto->bindParam(':idsubgrupo', $dados['idsubgrupo'], PDO::PARAM_INT);
  $edit_produto->bindParam(':preco', $dados['preco'], floatval(PDO::PARAM_STR));
  $edit_produto->bindParam(':quantidade', $dados['quantidade'], floatval(PDO::PARAM_STR));
  $edit_produto->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
  $edit_produto->bindParam('id', $dados['id'], PDO::PARAM_INT);

  $edit_produto->execute();

  if($edit_produto->rowCount()){
    $response = [
      "erro" => false,
      "mensagem" => "Alterou!"
    ];
  }else{
    $response = [
      "erro" => false,
      "mensagem" => "Não alterou!"
    ];
  }

http_response_code(200);
echo json_encode($response);
