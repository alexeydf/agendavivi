<?php

use App\Classes\Cliente;
//debug($_POST);
if(isset($_POST['id'])){
  $cliente = new Cliente();

  $cliente->idcliente = $_POST['id'];
  $cliente->nome = $_POST['nome'];
  $cliente->telefone = $_POST['telefone'];
  $cliente->endereco = $_POST['endereco'];
  $cliente->cpf = $_POST['cpf'];
  $cliente->email = $_POST['email'];

  $cliente->atualizar();

  header('Location: index.php?menuop=lista&status=realizado');
  exit;
}
?>