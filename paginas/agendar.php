<?php

use App\Classes\Cliente;
use App\Classes\Servico;

if(isset($_GET['id'])){
  $cliente = Cliente::getCliente('idcliente', $_GET['id']);
  $option = '
  <option value="'.$cliente->idcliente.'">'.$cliente->nome.'</option>
  ';

  $servicos = Servico::listar(null, ' nome asc');
  $option2 = '';
  foreach($servicos as $servico){
    $option2 .= '
    <option value="'.$servico->idservico.'">'.$servico->nome.'</option>
    ';
  }
}else{
  $clientes = Cliente::listar(null, ' nome asc');
  $option = '';
  foreach($clientes as $cliente){
    $option .= '
    <option value="'.$cliente->idcliente.'">'.$cliente->nome.'</option>
    ';
  }
  $servicos = Servico::listar(null, ' nome asc');
  $option2 = '';
  foreach($servicos as $servico){
    $option2 .= '
    <option value="'.$servico->idservico.'">'.$servico->nome.'</option>
    ';
  }
}
?>

<section class="agendar">
  <div class="titulo">
    <h3>Agendar</h3>
  </div>

  <form action="index.php?menuop=add-agenda" class="form-cad" method="post">
    <select name="cliente" id="">
      <?= $option ?>
    </select>

    <input type="date" name="dataservico" id="">
    <input type="date" name="dataretoque" id="">
    <input type="text" name="horario" placeholder="Horário:" id="">

    <select name="servico" id="">
      <option value="">-- Serviço --</option>
      <?= $option2 ?>
    </select>

    <textarea name="observacao" placeholder="Observação:" id="" cols="30" rows="10"></textarea>

    <button class="btn">Agendar</button>
  </form>
</section>