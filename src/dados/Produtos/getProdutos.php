<?php

include_once 'ClassConexao.php';

$query_produtos = "SELECT id, idusuariocad, idgrupo, idsubgrupo, ativo, preco, quantidade, nome FROM produto ORDER BY id ASC";
$result_produtos = $conn->prepare($query_produtos);
$result_produtos-> execute();

if(($result_produtos) AND ($result_produtos->rowCount() != 0)){
  while($row_produto = $result_produtos->fetch(PDO::FETCH_ASSOC)){
    var_dump($row_produto);
  }
}
?>