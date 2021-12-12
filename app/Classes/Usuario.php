<?php

namespace App\Classes;

use \App\Db\Database;
use \PDO;

class Usuario{
  public $id;
  public $login;
  public $senha;


  public function cadastrar(){
    $obDatabase = new Database('tb_usuarios');
    $this->id = $obDatabase->insert([
      'login' => $this->login,
      'senha' => $this->senha
    ]);

    return true;
  }

  public static function getLogin($login){
    return (new Database('tb_usuarios'))->select(' login = "'.$login.'"')->fetchObject(self::class);
  }

}