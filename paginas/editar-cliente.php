<?php

use App\Classes\Cliente;

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $cliente = Cliente::getCliente('idcliente', $id);
}
?>
<section class="editar-cliente">
  <a href="index.php?menuop=lista" class="btn-voltar"><i class="fas fa-angle-double-left"></i></a>

  <div class="titulo">
    <h3>Editar dados do cliente</h3>
  </div>

  <form action="index.php?menuop=alt-cliente" class="form-cad" method="post">
    <input type="number" name="id" placeholder="Nome:" readonly value="<?= $cliente->idcliente ?>">
    <input type="text" name="nome" placeholder="Nome:" value="<?= $cliente->nome ?>">
    <input type="text" name="endereco" placeholder="Endereço:" value="<?= $cliente->endereco ?>">
    <input type="text" name="cpf" placeholder="CPF:" value="<?= $cliente->cpf ?>">
    <input type="email" name="email" placeholder="E-Mail:" value="<?= $cliente->email ?>">
    <input type="text" name="telefone" placeholder="Telefone:" value="<?= $cliente->telefone ?>">
    <button type="submit" class="btn">Editar</button>
  </form>
</section>