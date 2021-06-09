<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Cadastrar Procedimento');

use \App\Entity\Eletroterapeutico;
use \App\Session\Login;

//OBRIGA O USUARIO A ESTAR LOGADO
Login::requireLogin();

//INSTACIA DE eletroterapeutico
$obEletroterapeutico = new Eletroterapeutico;

//VALIDACAO DO POST
if(isset($_POST['disfuncao'], $_POST['equipamento'], $_POST['ativo'],$_POST['parametros'],$_POST['intervalo'])){
    
    $obEletroterapeutico-> disfuncao = $_POST['disfuncao'];
    $obEletroterapeutico-> equipamento = $_POST['equipamento'];
    $obEletroterapeutico-> ativo = $_POST['ativo'];
    $obEletroterapeutico-> parametros = $_POST['parametros'];
    $obEletroterapeutico-> intervalo = $_POST['intervalo'];
    $obEletroterapeutico-> cadastrar();
    
    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';

//echo "<pre>"; print_r($obCliente); echo "</pre>"; exit;