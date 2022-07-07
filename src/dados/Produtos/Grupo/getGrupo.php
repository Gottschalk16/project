<?php

include_once 'ClassConexao.php';

$query_grupoprodutos = "SELECT id, idusuariocad, idsubgrupo, ativo, descricao FROM grupoproduto ORDER BY id ASC";
$result_grupoprodutos = $conn->prepare($query_grupoprodutos);
$result_grupoprodutos-> execute();

if(($result_grupoprodutos) AND ($result_grupoprodutos->rowCount() != 0)){
  while($row_grupoproduto = $result_grupoprodutos->fetch(PDO::FETCH_ASSOC)){
    var_dump($row_grupoproduto);
  }
}
?>