<?php

use App\Classes\Agenda;
use App\Classes\Cliente;
use App\Classes\Servico;

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $cliente = Cliente::getCliente('idcliente',$id);
  
  $nServicos = 0;
  $tr = '';
  $agendados = Agenda::listar(' idcliente = '.$id.'' );
  foreach($agendados as $agendado){
    $servico = Servico::getServico('idservico', $agendado->idservico);
    $tr .= '
    <tr>
      <td>'.$servico->nome.'</td>
      <td>'.$agendado->situacao.'</td>
      <td>'.formatData($agendado->dataservico).'</td>
    </tr>
    ';

    $nServicos++;
  }
}
?>
<section class="detalhes-cliente">
  <a href="index.php?menuop=lista" class="btn-voltar"><i class="fas fa-angle-double-left"></i></a>

  <div class="titulo">
    <h3>Detalhes <?= $cliente->nome ?></h3>
  </div>

  <div class="dados-cliente">
    <ul>
      <li>Nome: <span><?= $cliente->nome ?></span></li>
      <li>CPF: <span><?= $cliente->cpf ?></span></li>
      <li>Telefone: <span><?= $cliente->telefone ?></span></li>
      <li>E-Mail: <span><?= $cliente->email ?></span></li>
      <li>Endereço: <span><?= $cliente->endereco ?></span></li>
      <li>Data do cadastro: <span><?= formatData($cliente->datacad)  ?></span></li>
      <li>Serviços agendados: <span><?= $nServicos ?></span></li>
    </ul>
  </div>

  <div class="detalhes-btns">
    <a class="" href="index.php?menuop=editar-cliente&id=<?= $cliente->idcliente?>">Editar</a>
  </div>

  <div class="lista-servicos">
    <table class="tabela">
      <thead>
        <tr>
          <th>Serviço</th>
          <th>Situação</th>
          <th>Data</th>
        </tr>
      </thead>

      <tbody>
        <?= $tr ?>
      </tbody>
    </table>
  </div>
</section>