<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Integrador</title>
    <link rel="stylesheet" href="./res/css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="">
<!-- bg-dark text-light -->
<div class="container">
  <div class="jumbotron bg-primary">
    <h1>PROJETO INTEGRADOR</h1>
    <p></p>
    <?php
		if(isset($_SESSION['email']) == true) {
    ?>
      <a href="deslogar"><button type="button" class="btn btn-danger">Deslogar</button></a>
    <?php
    }
    ?>
    <?php
		if(isset($_SESSION['nome']) == true) {
    ?>
      <br>
      <br>
      <p style="font-size: 1.25em; color: white;">Usuário: <b><?php echo $_SESSION['nome']; ?></b></p>
    <?php
    }
    ?>
  </div>

