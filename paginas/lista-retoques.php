<?php

use App\Classes\Cliente;
use App\Classes\Retoque;
use App\Classes\Servico;

$retoques = Retoque::listar(' situacao = 0 ', ' dataretoque ASC');
//debug($retoques);
$tr = '';
foreach($retoques as $retoque){
  $cliente = Cliente::getCliente('idcliente', $retoque->idcliente);
  $servico = Servico::getServico('idservico', $retoque->idservico);
  $tr .= '
  <tr>
    <td>'.$cliente->nome.'</td>
    <td>'.$servico->nome.'</td>
    <td>'.$retoque->dataretoque.'</td>
    <td><a href="index.php?menuop=agendar&id='.$cliente->idcliente.'"><i class="fas fa-calendar-plus"></i></a></td>
    <td><a href="index.php?menuop=check-retoque&id='.$retoque->idretoque.'"><i class="fas fa-check"></i></a></td>
    <!--<td><a href=""><i class="fas fa-times"></i></a></td>-->
  </tr>
  ';
}
?>
<section class="lista-retoques">
  <div class="titulo">
    <h3>Retoques</h3>
  </div>

  <div class="titulo">
    <h4>Lista Clientes</h4>
  </div>

  <table class="tabela">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Serviço</th>
        <th>Data</th>
      </tr>
    </thead>

    <tbody>
      <?= $tr ?>
    </tbody>
  </table>
</section>