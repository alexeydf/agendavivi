<?php

$tituloIndex = null;

$menuop = (isset($_GET['menuop']))?$_GET['menuop']:'home';
switch ($menuop) {
  case 'roubos':
    $tituloIndex = 'Roubos';
    break;
  case 'mercado_armas':
    $tituloIndex = 'Mercado';
    break;
  case 'festa_rave':
    $tituloIndex = 'Festa Rave';
    break;
  case 'missoes':
    $tituloIndex = 'Missões';
    break;
  
  default:
    $tituloIndex = 'The Crims Clone';
    break;
}
