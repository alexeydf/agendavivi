<?php

use App\Classes\Cliente;

$clientes = Cliente::listar(null, ' nome asc');
$tr = '';
foreach($clientes as $cliente){
  $tr .= '
  <tr>
    <td>'.$cliente->nome.'</td>
    <td><a href="index.php?menuop=detalhes-cliente&id='.$cliente->idcliente.'"><i class="fas fa-clipboard-list"></i></a></td>
    <td><a href="index.php?menuop=editar-cliente&id='.$cliente->idcliente.'"><i class="fas fa-pencil-alt"></i></a></td>
    <td><a href="index.php?menuop=agendar&id='.$cliente->idcliente.'"><i class="fas fa-calendar-plus"></i></a></td>
    <!--<td><a href=""><i class="fas fa-times"></i></a></td>-->
  </tr>
  ';
}
?>
<section class="lista-clientes">
  <div class="titulo">
    <h3>Clientes</h3>
  </div>

  <nav class="menu-clientes">
    <a href="index.php?menuop=clientes">Cadastar</a>
    <a href="index.php?menuop=lista">Lista</a>
  </nav>

  <div class="titulo">
    <h4>Lista Clientes</h4>
  </div>

  <table class="tabela">
    <thead>
      <tr>
        <th>Nome</th>
      </tr>
    </thead>

    <tbody>
      <?= $tr ?>
    </tbody>
  </table>
</section>