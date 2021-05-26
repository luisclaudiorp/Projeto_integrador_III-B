<?php

    include("empregado-interface.php");
    include("comissionado-class.php");
    include("horista-class.php");

    $empregado1 = new Comissionado();
    $empregado1->nome = "Carlos Almeida";
    $empregado1->cpf = "020.235.230-33";
    $empregado1->data_nasc = "31/08/1978";
    $empregado1->total_vendas = 3467.90;
    $empregado1->taxa_comissao = 10.00;

    $empregado2 = new Horista();
    $empregado2->nome = "Manuela Mendes";
    $empregado2->cpf = "920.239.240-21";
    $empregado2->data_nasc = "14/05/1989";
    $empregado2->preco_hora = 49.90;
    $empregado2->horas_trabalhadas = 160;

    echo "A pessoa de nome {$empregado1->get_nome()} tem salário de R$ {$empregado1->vencimento()}. \n";
    echo "A pessoa de nome {$empregado2->get_nome()} tem salário de R$ {$empregado2->vencimento()}. \n";
    
?>






