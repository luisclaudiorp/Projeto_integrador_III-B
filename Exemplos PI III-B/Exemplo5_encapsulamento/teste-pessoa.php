<?php

    include("pessoa-class.php");
    include("aluno-class.php");

    $pessoa1 = new Pessoa();
    $pessoa1->set_nome("Carlos Almeida");
    $pessoa1->set_cpf("020.235.230-33");
    $pessoa1->set_data_nasc("31/08/1978");
    $pessoa1->set_endereco("Avenida Pelotas, 567");

    $pessoa2 = new Pessoa();
    $pessoa2->set_nome("Manuela Mendes");
    $pessoa2->set_cpf("920.239.240-21");
    $pessoa2->set_data_nasc("14/05/1989");
    $pessoa2->set_endereco("Rua das Hortencias, 69");
    $pessoa2->peso = 65;
    $pessoa2->altura = 1.64;

    $aluno1= new Aluno();
    $aluno1->set_nome("Mateus Silva");
    $aluno1->set_cpf("829.293.093-19");
    $aluno1->set_matricula(1029);
    $aluno1->curso = "Analise e Desenvolvimento de Sistemas";

    echo "A pessoa de nome {$pessoa1->get_nome()} mora na {$pessoa1->get_endereco()}. \n";
    echo "A pessoa de nome {$pessoa2->get_nome()} tem IMC igual a {$pessoa2->calculo_imc()}. \n";
    echo "O aluno de nome {$aluno1->get_nome()} tem matricula igual a {$aluno1->get_matricula()} e estuda {$aluno1->curso}. \n";
    
?>






