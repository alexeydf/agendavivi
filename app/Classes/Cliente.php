<?php

namespace App\Classes;

use \App\Db\Database;
use \PDO;

class Cliente{
  public $idcliente;
  public $nome;
  public $endereco;
  public $cpf;
  public $email;
  public $telefone;
  public $datacad;

  public function texto(){
    $texto = '
    
    ';

    return $texto;
  }

  public static function listar( $where = null, $order = null, $limit = null)
  {
    return (new Database('clientes'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  public static function getCliente($chave, $valor){
    return (new Database('clientes'))->select(' '.$chave.' = "'.$valor.'"')->fetchObject(self::class);
  }

  public function addCliente()
  {
    $baseDados = new Database('clientes');
    $this->id = $baseDados->insert([
      'nome' => $this->nome,
      'endereco' => $this->endereco,
      'cpf' => $this->cpf,
      'email' => $this->email,
      'telefone' => $this->telefone
    ]);

    return true;
  }

  public function atualizar($tabela = null)
  {
    return (new Database('clientes'))->update(' idcliente = ' . $this->idcliente, [
      'nome' => $this->nome,
      'endereco' => $this->endereco,
      'cpf' => $this->cpf,
      'email' => $this->email,
      'telefone' => $this->telefone
    ]);
  }

  public function excluir(){
    return (new Database('tb_agenda'))->delete(' id = ' . $this->id);
  }
  
}
