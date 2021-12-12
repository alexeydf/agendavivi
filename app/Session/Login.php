<?php
namespace App\Session;

class Login{

  private static function init(){
    if(session_status() !== PHP_SESSION_ACTIVE){
      session_start();
    }
  }

  public static function getUsuarioLogado(){
    self::init();

    return self::isLogged() ? $_SESSION['usuario'] : null;
  }

  public static function login($obUsuario){
    self::init();

    $_SESSION['usuario'] = [
      'id' => $obUsuario->id,
      'login' => $obUsuario->login
    ];

    header('location: ../index.php?menuop=agendados');
    exit;
  }

  public static function logout(){
    self::init();

    unset($_SESSION['usuario']);
    header('location: paginas/login.php');
    exit;
  }

  public static function isLogged(){
    self::init();

    return isset($_SESSION['usuario']['id']);
  }

  public static function requireLogin(){
    if(!self::isLogged()){
      header('location: paginas/login.php');
      exit;
    }
  }

  public static function requireLogout(){
    if(self::isLogged()){
      header('location: ../index.php');
      exit;
    }
  }
}

