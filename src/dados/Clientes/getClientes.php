<?php

include_once 'ClassConexao.php';

$query_clientes = "SELECT id, idusuariocad, ativo, nome, endereco, complemento, bairro, telefone, email,
                    cep, cpf, cidade, uf
                    FROM clientes ORDER BY id ASC";
$result_clientes = $conn->prepare($query_clientes);
$result_clientes-> execute();

if(($result_clientes) AND ($result_clientes->rowCount() != 0)){
  while($row_clientes = $result_clientes->fetch(PDO::FETCH_ASSOC)){
    var_dump($row_clientes);
  }
}
?>