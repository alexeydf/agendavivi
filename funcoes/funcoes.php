<?php


function formatar($valor){
  
  $valor = number_format($valor,0,'','.');

  return $valor;
}

function debug($var){
  echo '<pre>'; print_r($var); echo "</pre>"; exit;
}

function formatData($data){
  $data = date('d/m/Y', strtotime($data));

  return $data;
}



//number_format($granaJogador,0,'','.')