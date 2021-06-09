<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Procedimento');

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


//VALIDAÇÃO DO PROCEDIMENTO
if(!$obEletroterapeutico instanceof Eletroterapeutico){
    header('location: index.php?status=error');
    exit;
}

//VALIDACAO DO POST
if(isset($_POST['disfuncao'], $_POST['equipamento'], $_POST['parametros'], $_POST['intervalo'], $_POST['ativo'] )){
    

    $obEletroterapeutico-> disfuncao = $_POST['disfuncao'];
    $obEletroterapeutico-> equipamento = $_POST['equipamento'];
    $obEletroterapeutico-> parametros = $_POST['parametros'];
    $obEletroterapeutico-> intervalo = $_POST['intervalo'];
    $obEletroterapeutico-> ativo = $_POST['ativo'];


    $obEletroterapeutico-> atualizar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';

//echo "<pre>"; print_r($obCliente); echo "</pre>"; exit;