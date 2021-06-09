<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Eletroterapeutico;
use \App\Session\Login;

//OBRIGA O USUARIO A ESTAR LOGADO
Login::requireLogin();

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//CONSULTA PROCEDIMENTO
$obEletroterapeutico = Eletroterapeutico::getEletroterapeutico($_GET['id']);


//VALIDAÇÃO DA PROCEDIMENTO
if(!$obEletroterapeutico instanceof Eletroterapeutico){
    header('location: index.php?status=error');
    exit;
}

//VALIDACAO DO POST
if(isset($_POST['excluir'])){

    $obEletroterapeutico-> excluir();
    
    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';

//echo "<pre>"; print_r($obEletroterapeutico); echo "</pre>"; exit;