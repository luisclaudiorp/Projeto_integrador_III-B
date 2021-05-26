<?php

//Criação da classe
class Cachorro
{
    //Declaração dos atributos
    public $raca;
    public $cor;
    public $nome;
    public $peso; 

    //Função Latir
    public function latindo()
    {
        echo "O cachorro está latindo. \n"; 
    }

    //Função Comer
    public function comendo()
    {
        echo "O cachorro está comendo. \n";
    }

    //Função Brincar
    public function brincando()
    {
        echo "O cachorro está brincando. \n";
    }


}
?>