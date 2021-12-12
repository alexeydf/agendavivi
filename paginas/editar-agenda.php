<?php

use App\Classes\Agenda;
use App\Classes\Cliente;
use App\Classes\Servico;

if(isset($_GET['id'])){
  $agendado = Agenda::getAgenda('idagenda', $_GET['id']);
  $cliente = Cliente::getCliente('idcliente', $agendado->idcliente);
  $servico = Servico::getServico('idservico', $agendado->idservico);
}

$clientes = Cliente::listar(null, ' nome asc');
$option = '';
foreach($clientes as $clienteLista){
  $option .= '
  <option value="'.$clienteLista->idcliente.'">'.$clienteLista->nome.'</option>
  ';
}
$servicos = Servico::listar(null, ' nome asc');
$option2 = '';
foreach($servicos as $servicoLista){
  $option2 .= '
  <option value="'.$servicoLista->idservico.'">'.$servicoLista->nome.'</option>
  ';
}
?>

<section class="editar-agenda">
  <form action="index.php?menuop=alt-agenda" class="form-cad" method="post">
    <input type="number" name="id" readonly value="<?= $agendado->idagenda ?>">
    <select name="cliente" id="">
      <option value="<?= $cliente->idcliente ?>"><?= $cliente->nome ?></option>
      <?= $option ?>
    </select>

    <input type="date" name="dataservico" value="<?= $agendado->dataservico ?>">
    <input type="date" name="dataretoque" value="<?= $agendado->dataretoque ?>">
    <input type="text" name="horario" placeholder="Horário:" value="<?= $agendado->horario ?>">

    <select name="servico" id="">
      <option value="<?= $agendado->idservico ?>"><?= $servico->nome ?></option>
      <?= $option2 ?>
    </select>

    <select name="situacao" id="">
      <option value="<?= $agendado->situacao ?>"><?= $agendado->situacao ?></option>
      <option value="Realizado">Realizado</option>
      <option value="Cancelado">Cancelado</option>
      <option value="Cancelado">Pendente</option>
      <option value="Excluir">Excluir</option>
    </select>

    <textarea name="observacao" placeholder="Observação:" id="" cols="30" rows="10"><?= $agendado->observacao ?></textarea>

    <button class="btn">Editar</button>
  </form>
</section>