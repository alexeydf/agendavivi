<?php

use App\Classes\Agenda;
use App\Classes\Retoque;

//debug($_POST);
if(isset($_POST['id'])){
  $agenda = new Agenda();
  $agenda->idagenda = $_POST['id'];
  $agenda->idcliente = $_POST['cliente'];
  $agenda->dataservico = $_POST['dataservico'];
  $agenda->dataretoque = $_POST['dataretoque'];
  $agenda->horario = $_POST['horario'];
  $agenda->idservico = $_POST['servico'];
  $agenda->observacao = $_POST['observacao'];
  $agenda->situacao = $_POST['situacao'];

  if($agenda->situacao == 'Realizado'){
    $agenda->atualizar();

    $retoque = new Retoque();
    $retoque->idcliente = $agenda->idcliente;
    $retoque->idservico = $agenda->idservico;
    $retoque->dataretoque = $agenda->dataretoque;
    $retoque->addRetoque();
  }
  

  header('Location: index.php?menuop=agendar&status=realizado');
  exit;
}
?>