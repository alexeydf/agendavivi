<?php

use App\Classes\Agenda;
use App\Classes\Cliente;

if(isset($_POST['cliente'], $_POST['dataservico'], $_POST['horario'], $_POST['servico'], $_POST['observacao'])){
  $cliente = Cliente::getCliente('idcliente',$_POST['cliente']);
  
  $agenda = new Agenda();
  $agenda->idcliente = $_POST['cliente'];
  $agenda->dataservico = $_POST['dataservico'];
  $agenda->dataretoque = $_POST['dataretoque'];
  $agenda->horario = $_POST['horario'];
  $agenda->idservico = $_POST['servico'];
  $agenda->observacao = $_POST['observacao'];

  $agenda->addAgenda();

  header('Location: index.php?menuop=agendar&status=realizado');
  exit;
}