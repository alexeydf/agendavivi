<?php

namespace App\Classes;

use \App\Db\Database;
use \PDO;

class Retoque{
  public $idretoque;
  public $idcliente;
  public $dataretoque;
  public $idservico;
  public $diaSemana;
  public $situacao;

  public function getDiaSemana(){
    $diaSemana = date('w', strtotime($this->dataServico));

    switch ($diaSemana) {
      case 0:
        $diaSemana = 'Domingo';
        break;
      case 1:
        $diaSemana = 'Segunda-Feira';
        break;
      case 2:
        $diaSemana = 'Terça-Feira';
        break;
      case 3:
        $diaSemana = 'Quarta-Feira';
        break;
      case 4:
        $diaSemana = 'Quinta-Feira';
        break;
      case 5:
        $diaSemana = 'Sexta-Feira';
        break;
      case 6:
        $diaSemana = 'Sábado';
        break;
    }

    return $diaSemana;
  }

  public function texto(){
    $texto = '
    <div class="dia-servico">
      <div class="dia">
        <span>'.$this->dataservico.'</span> - <span>'.$this->diasemana.'</span>
      </div>

      <div class="servico">
        <span>'.$this->servico.'</span>
      </div>
    </div>
    ';

    return $texto;
  }

  public static function listar( $where = null, $order = null, $limit = null)
  {
    return (new Database('retoques'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  public static function getRetoque($chave, $valor){
    return (new Database('retoques'))->select(' '.$chave.' = "'.$valor.'"')->fetchObject(self::class);
  }

  public function addRetoque()
  {
    $baseDados = new Database('retoques');
    $this->id = $baseDados->insert([
      'idcliente' => $this->idcliente,
      'dataretoque' => $this->dataretoque,
      'idservico' => $this->idservico
    ]);

    return true;
  }

  public function atualizar($tabela = null)
  {
    return (new Database('retoques'))->update(' idretoque = ' . $this->idretoque, [
      'situacao' => $this->situacao
    ]);
  }

  public function excluir(){
    return (new Database('tb_agenda'))->delete(' id = ' . $this->id);
  }
  
}
