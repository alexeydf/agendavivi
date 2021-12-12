<?php

use App\Session\Login;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/funcoes/funcoes.php';
require __DIR__ . '/funcoes/alertas.php';

/*Login::requireLogin();
$usuarioLogado = Login::getUsuarioLogado();*/
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>

  <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
  <link rel="manifest" href="icon/site.webmanifest">

  <link rel="stylesheet" href="css/style.css?<?php echo rand(1, 1000); ?>">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>

<body>
  <header class="top-header">
    <div class="logo">
      <img src="img/logo01.png" alt="Logo Vivi Lira">
      <h1>Agenda <span>Ver. 2.0</span></h1>
    </div>

    <div class="btn-menu">
      <i class="fas fa-bars"></i>
    </div>

    <nav class="menu">
      <a href="index.php?menuop=clientes">Clientes</a>
      <a href="index.php?menuop=agendar">Agendar</a>
      <a href="index.php?menuop=agendados">Agendados</a>
      <a href="index.php?menuop=finalizados">Finalizados</a>
      <a href="index.php?menuop=retoques">Retoques</a>
    </nav>

    <div class="user-ativo">
      <div>
          Usuário: <!--<span><?= $usuarioLogado['login'] ?></span>-->
      </div>
      <a href="index.php?menuop=sair">Sair</a>
    </div>
  </header>

  <main class="center">
    <?php
    $menuop = (isset($_GET['menuop'])) ? $_GET['menuop'] : 'home';
    switch ($menuop) {
      case 'clientes':
        include("paginas/clientes.php");
        break;
      case 'add-cliente':
        include("processos/add-cliente.php");
        break;
      case 'lista':
        include("paginas/lista-clientes.php");
        break;
      case 'detalhes-cliente':
        include("paginas/detalhes-cliente.php");
        break;
      case 'editar-cliente':
        include("paginas/editar-cliente.php");
        break;
      case 'alt-cliente':
        include("processos/alt-cliente.php");
        break;
      case 'agendar':
        include("paginas/agendar.php");
        break;
      case 'add-agenda':
        include("processos/add-agenda.php");
        break;
      case 'agendados':
        include("paginas/agendados.php");
        break;
      case 'finalizados':
        include("paginas/finalizados.php");
        break;
      case 'editar-agenda':
        include("paginas/editar-agenda.php");
        break;
      case 'alt-agenda':
        include("processos/alt-agenda.php");
        break;
      case 'retoques':
        include("paginas/lista-retoques.php");
        break;
      case 'check-retoque':
        include("processos/check-retoque.php");
        break;
      

      default:
        include("paginas/agendados.php");
        break;
    }
    ?>
  </main>
</body>

</html>