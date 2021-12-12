<?php

$status = isset($_GET['status']) ? $_GET['status'] : '';
$nomePuta = isset($_GET['nome']) ? $_GET['nome'] : '';
$qnt = isset($_GET['qnt']) ? $_GET['qnt'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : '';
$armaComprada = isset($_GET['arma']) ? $_GET['arma'] : '';
$granaTotal = (isset($_GET['grana'])) ? $_GET['grana'] : '';
$inteligenciaGanha = (isset($_GET['inteligencia'])) ? $_GET['inteligencia'] : '';
$forcaGanha = (isset($_GET['forca'])) ? $_GET['forca'] : '';
$carismaGanha = (isset($_GET['carisma'])) ? $_GET['carisma'] : '';
$resistenciaGanha = (isset($_GET['resistencia'])) ? $_GET['resistencia'] : '';
$item = (isset($_GET['item'])) ? $_GET['item'] : '';

switch ($status) {
  //roubar
  case 'erro':
    $status = '
    <div class="status-erro">
      <p>Login ou senha incorretos!</p>
    </div>
    ';
    break;
  case 'realizado':
    $status = '
    <div class="status">
      <p>Agendamento realizado com sucesso!</p>
    </div>
    ';
    break;
  case 'atualizado':
    $status = '
    <div class="status">
      <p>A situação foi atualizada!</p>
    </div>
    ';
    break;
  case 'excluido':
    $status = '
    <div class="status">
      <p>O agendamento foi excluído</p>
    </div>
    ';
    break;
  
  default:
    # code...
    break;
}

