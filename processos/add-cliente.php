<?php

use App\Classes\Cliente;

if(isset($_POST['nome'], $_POST['telefone'])){
  $cliente = new Cliente();
  $cliente->nome = $_POST['nome'];
  $cliente->telefone = $_POST['telefone'];
  $cliente->endereco = $_POST['endereco'];
  $cliente->cpf = $_POST['cpf'];
  $cliente->email = $_POST['email'];

  $cliente->addCliente();

  header('Location: index.php?menuop=clientes&status=realizado');
  exit;
}