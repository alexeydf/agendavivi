<?php

namespace App\Classes;

use \App\Db\Database;
use \PDO;

class Servico{
  public $idservico;
  public $nome;
  public $agendados;

  public function texto(){
    $texto = '
    
    ';

    return $texto;
  }

  public static function listar( $where = null, $order = null, $limit = null)
  {
    return (new Database('servicos'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  public static function getServico($chave, $valor){
    return (new Database('servicos'))->select(' '.$chave.' = "'.$valor.'"')->fetchObject(self::class);
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
    return (new Database('tb_agenda'))->update(' id = ' . $this->id, [
      'dataservico' => $this->dataServico,
      'horario' => $this->horario,
      'servico' => $this->servico,
      'trancista' => $this->trancista,
      'observacao' => $this->observacao,
      'diasemana' => $this->diaSemana,
      'situacao' => $this->situacao
    ]);
  }

  public function excluir(){
    return (new Database('tb_agenda'))->delete(' id = ' . $this->id);
  }
  
}
