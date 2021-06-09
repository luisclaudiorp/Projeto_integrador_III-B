<?php

use \App\Session\Login;

//DADOS DO USUSARIO LOGADO
$usuarioLogado = Login::getUsuarioLogado();

//DETALHES DO USUSARIO
$usuario = $usuarioLogado ? 
            $usuarioLogado['nome'].'<a href="logout.php" class="text-light font-weight-bold ml-2">Sair</a>' :
            'Visitante <a href="login.php" class="text-light font-weight-bold ml-2">Entrar</a>'

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sistema</title>
  </head>
  <body class="bg-dark text-light">

    <div class="container text-dark">

      <div class="jumbotron bg-primary">
        <h1>Sistema</h1>
        <p>Gerenciamento</p>

        <hr class="border-light">
        <div class="d-flex justify-content-start">
          <?=$usuario?>
        </div>
      </div>

