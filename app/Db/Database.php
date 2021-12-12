<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{
  const HOST = 'localhost';
  const NAME = 'vivilira';
  const USER = 'root';
  const PASS = '';
  /*
  const HOST = 'sql308.epizy.com';
  const NAME = 'epiz_28109983_dbcabelos';
  const USER = 'epiz_28109983';
  const PASS = 'D1ssZo10'; */

  private $tabela;
  private $conexao;

  public function __construct($tabela = null){
    $this->tabela = $tabela;
    $this->setConnection();
  }

  private function setConnection(){
    try{
      $this->conexao = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
      $this->conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  public function execute($query,$params = []){
    try{
      $statement = $this->conexao->prepare($query);
      $statement->execute($params);
      return $statement;
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  public function insert($values){
    //dados da query
    $fields = array_keys($values);
    $binds = array_pad([],count($fields),'?');
    
    //monta a query
    $query = 'INSERT INTO '.$this->tabela.'('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
    //echo $query;exit;
    //executa query
    $this->execute($query,array_values($values));

    return $this->conexao->lastInsertId();
  }

  public function select($where = null, $order = null, $limit = null, $fields = '*'){
    //dados da query
    $where = strlen($where) ? 'WHERE'.$where : '';
    $order = strlen($order) ? 'ORDER BY'.$order : '';
    $limit = strlen($limit) ? 'LIMIT'.$limit : '';

    $query = 'SELECT '.$fields. ' FROM '.$this->tabela.' '.$where.' '.$order.' '.$limit;
    //echo $query;
    return $this->execute($query);
  }

  public function update($where,$values){
    $fields = array_keys($values);
    $query = 'UPDATE '.$this->tabela.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
    //echo $query;exit;
    $this->execute($query, array_values($values));

    return true;
  }

  public function delete($where){
    $query = 'DELETE FROM '.$this->tabela.' WHERE '.$where;
    //echo $query;exit;
    $this->execute($query);

    return true;
  }

  public function deleteAll(){
    $query = 'DELETE FROM '.$this->tabela;

    $this->execute($query);

    return true;
  }
}