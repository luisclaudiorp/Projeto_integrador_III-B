<?php

    include("pessoa-class.php");
    include("aluno-class.php");

    $pessoa1 = new Pessoa();
    $pessoa1->nome = "Carlos Almeida";
    $pessoa1->cpf = "020.235.230-33";
    $pessoa1->data_nasc = "31/08/1978";
    $pessoa1->endereco = "Avenida Pelotas, 567";

    $pessoa2 = new Pessoa();
    $pessoa2->nome = "Manuela Mendes";
    $pessoa2->cpf = "920.239.240-21";
    $pessoa2->data_nasc = "14/05/1989";
    $pessoa2->peso = 65;
    $pessoa2->altura = 1.64;

    //Conceito de Herança
    $aluno1= new Aluno();
    $aluno1->nome = "Mateus Silva";
    $aluno1->cpf = "829.293.093-19";
    $aluno1->matricula = 1029;
    $aluno1->curso = "Analise e Desenvolvimento de Sistemas";

    echo "A pessoa de nome {$pessoa1->nome} mora na {$pessoa1->endereco}. \n";
    echo "A pessoa de nome {$pessoa2->nome} tem IMC igual a {$pessoa2->calculo_imc()}. \n";
    echo "O aluno de nome {$aluno1->nome} tem matricula igual a {$aluno1->matricula} e estuda {$aluno1->curso}. \n";
?>






