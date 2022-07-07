<?php

include_once 'ClassConexao.php';

$query_formapgto = "SELECT id, idusuariocad, ativo, nome, tipo, parcelas FROM formapgto ORDER BY id ASC";
$result_formapgto = $conn->prepare($query_formapgto);
$result_formapgto-> execute();

if(($result_formapgto) AND ($result_formapgto->rowCount() != 0)){
  while($row_formapgto = $result_formapgto->fetch(PDO::FETCH_ASSOC)){
    var_dump($row_formapgto);
  }
}
?>