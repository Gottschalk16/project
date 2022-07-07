<?php

include_once 'ClassConexao.php';

$query_subgrupoprodutos = "SELECT id, idusuariocad, ativo, descricao FROM subgrupoproduto ORDER BY id ASC";
$result_subgrupoprodutos = $conn->prepare($query_subgrupoprodutos);
$result_subgrupoprodutos-> execute();

if(($result_subgrupoprodutos) AND ($result_subgrupoprodutos->rowCount() != 0)){
  while($row_subgrupoproduto = $result_subgrupoprodutos->fetch(PDO::FETCH_ASSOC)){
    var_dump($row_subgrupoproduto);
  }
}
?>