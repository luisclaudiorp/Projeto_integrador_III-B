<?php

    include("cachorro-class.php");

    //Criação dos objetos
    $cachorro1 = new Cachorro();
    $cachorro1->nome = "Moli";
    $cachorro1->raca = "Shihtzu";
    $cachorro1->peso = 9;
    $cachorro1->cor = "Preto/Branco";

    $cachorro2 = new Cachorro();
    $cachorro2->nome = "Jolie";
    $cachorro2->raca = "Lulu da pomerania";
    $cachorro2->peso = 5;

    echo "Nome do cachorro: ".$cachorro1->nome."\n";
    $cachorro1->latindo();
    $cachorro1->brincando();

    echo "Nome do cachorro: ".$cachorro2->nome."\n";
    $cachorro2->cor = "Laranja";
    $cachorro2->comendo();

?>






