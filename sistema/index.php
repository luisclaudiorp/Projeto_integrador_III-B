<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Eletroterapeutico;
use \App\Db\Pagination;
use \App\Session\Login;

//OBRIGA O USUARIO A ESTAR LOGADO
Login::requireLogin();

//BUSCA
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

//FILTRO DE STATUS
$filtroStatus = filter_input(INPUT_GET, 'filtroStatus', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus, ['s', 'n']) ? $filtroStatus : '';

//CONDICOES SQL
$condicoes = [
    strlen($busca) ? 'disfuncao LIKE "%'.str_replace(' ', '%', $busca).'%"' : null,
    strlen($filtroStatus) ? 'ativo = "'.$filtroStatus.'"' : null
];

//REMOVE POSIÇÕES
$condicoes = array_filter($condicoes);

//CLAUSULA WHERE
$where = implode(' AND ',$condicoes);

//QUANTIDADE TOTAL DE Eletroterapeuticos
$quantidadeEletroterapeuticos = Eletroterapeutico::getQuantidadeEletroterapeuticos($where);

//PAGINATION
$obPagination = new Pagination($quantidadeEletroterapeuticos, $_GET['pagina'] ?? 1, 5);

//OBTEM OS Eletroterapeuticos
$eletroterapeuticos = Eletroterapeutico::getEletroterapeuticos($where,null,$obPagination->getLimit());


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';