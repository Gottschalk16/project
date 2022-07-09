<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include_once 'ClassConexao.php';

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);
  $query_cliente = "UPDATE clientes SET 
                      ativo=:ativo,
                      nome=:nome,
                      endereco=:endereco,
                      complemento=:complemento,
                      bairro=:bairro,
                      telefone=:telefone,
                      email=:email,
                      cep=:cep,
                      cpf=:cpf,
                      cidade=:cidade,
                      uf=:uf
                      WHERE id=:id";

  $edit_cliente = $conn->prepare($query_cliente);

  $edit_cliente->bindParam(':ativo', $dados['ativo'], PDO::PARAM_INT);
  $edit_cliente->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
  $edit_cliente->bindParam(':endereco', $dados['endereco'], PDO::PARAM_STR);
  $edit_cliente->bindParam(':complemento', $dados['complemento'], PDO::PARAM_STR);
  $edit_cliente->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
  $edit_cliente->bindParam(':telefone', $dados['telefone'], PDO::PARAM_STR);
  $edit_cliente->bindParam(':email', $dados['email'], PDO::PARAM_STR);
  $edit_cliente->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);
  $edit_cliente->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
  $edit_cliente->bindParam(':cidade', $dados['cidade'], PDO::PARAM_STR);
  $edit_cliente->bindParam(':uf', $dados['uf'], PDO::PARAM_STR);
  $edit_cliente->bindParam('id', $dados['id'], PDO::PARAM_INT);

  $edit_cliente->execute();

  if($edit_cliente->rowCount()){
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
