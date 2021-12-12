<?php

use App\Classes\Agenda;
use App\Classes\Cliente;
use App\Classes\Servico;

$agendados = Agenda::listar( ' situacao = "Pendente"', ' `dataservico` ASC');
//debug($agendados);
$resultado = '';
foreach($agendados as $agendado){
  $agendado->dataservico = formatData($agendado->dataservico);
  $cliente = Cliente::getCliente('idcliente', $agendado->idcliente);
  $servico = Servico::getServico('idservico', $agendado->idservico);
  //debug($servico);
  $resultado .= '
  <div class="agendados-card">
    <ul>
      <li><span>Nome:</span> '.$cliente->nome.'</li>
      <li><span>Data:</span> '.$agendado->dataservico.'</li>
      <li><span>Horário:</span> '.$agendado->horario.'</li>
      <li><span>Serviço:</span> '.$servico->nome.'</li>
      <li><span>Situação:</span> '.$agendado->situacao.'</li>
      <li><span>Observação:</span><br> '.$agendado->observacao.'</li>
    </ul>
    <a class="mais" href="index.php?menuop=editar-agenda&id='.$agendado->idagenda.'"><i class="fas fa-pencil-alt"></i> Editar</a>
  </div>
  ';
}

?>

<div class="titulo">
  <h3>Agendados</h3>
  <?= $status ?>
</div>

<section class="agendados">
  <?= $resultado ?>
  
</section>