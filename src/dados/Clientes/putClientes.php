<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include_once 'ClassConexao.php';

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);
  $query_usuario = "UPDATE clientes SET 
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

  $edit_usuario = $conn->prepare($query_usuario);

  $edit_usuario->bindParam(':ativo', $dados['ativo'], PDO::PARAM_INT);
  $edit_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
  $edit_usuario->bindParam(':endereco', $dados['endereco'], PDO::PARAM_STR);
  $edit_usuario->bindParam(':complemento', $dados['complemento'], PDO::PARAM_STR);
  $edit_usuario->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
  $edit_usuario->bindParam(':telefone', $dados['telefone'], PDO::PARAM_STR);
  $edit_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
  $edit_usuario->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);
  $edit_usuario->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
  $edit_usuario->bindParam(':cidade', $dados['cidade'], PDO::PARAM_STR);
  $edit_usuario->bindParam(':uf', $dados['uf'], PDO::PARAM_STR);
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
