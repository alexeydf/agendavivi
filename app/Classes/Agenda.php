<?php

namespace App\Classes;

use \App\Db\Database;
use \PDO;

class Agenda{
  public $idagenda;
  public $idcliente;
  public $dataservico;
  public $dataretoque;
  public $horario;
  public $idservico;
  public $observacao;
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
    return (new Database('agenda'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  public static function getAgenda($chave, $valor){
    return (new Database('agenda'))->select(' '.$chave.' = "'.$valor.'"')->fetchObject(self::class);
  }

  public function addAgenda()
  {
    $baseDados = new Database('agenda');
    $this->id = $baseDados->insert([
      'idcliente' => $this->idcliente,
      'dataservico' => $this->dataservico,
      'dataretoque' => $this->dataretoque,
      'horario' => $this->horario,
      'idservico' => $this->idservico,
      'observacao' => $this->observacao
      
    ]);

    return true;
  }

  public function atualizar($tabela = null)
  {
    return (new Database('agenda'))->update(' idagenda = ' . $this->idagenda, [
      'idcliente' => $this->idcliente,
      'dataservico' => $this->dataservico,
      'dataretoque' => $this->dataretoque,
      'horario' => $this->horario,
      'idservico' => $this->idservico,
      'observacao' => $this->observacao,
      'situacao' => $this->situacao
    ]);
  }

  public function excluir(){
    return (new Database('tb_agenda'))->delete(' id = ' . $this->id);
  }
  
}
