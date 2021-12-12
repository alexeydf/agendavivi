<?php

use App\Classes\Retoque;

if(isset($_GET['id'])){
  $retoque = Retoque::getRetoque('idretoque', $_GET['id']);
  $retoque->situacao = 1;
  $retoque->atualizar();

  header('Location: index.php?menuop=retoques&status=realizado');
  exit;
}

?>