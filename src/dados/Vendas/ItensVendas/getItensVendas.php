<?php

include_once 'ClassConexao.php';

$query_vendas = "SELECT id, idusuariocad, idvenda, idproduto, 
                  ativo, quantidade, preco
                  FROM itensvenda ORDER BY id ASC";
$result_vendas = $conn->prepare($query_vendas);
$result_vendas-> execute();

if(($result_vendas) AND ($result_vendas->rowCount() != 0)){
  while($row_vendas = $result_vendas->fetch(PDO::FETCH_ASSOC)){
    var_dump($row_vendas);
  }
}
?>